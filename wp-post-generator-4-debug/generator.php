<?php
/*
Plugin Name: Post Generator 4 DEBUG
Plugin URI: None
Description: デバック用のダミーポストデータを生成します。
Version: 0.0.1
Author: Saito
Author URI: None
License: PG4D01
*/

add_action('admin_menu', 'add_generate_management_page');

function add_generate_management_page(){
	add_menu_page('ダミーデータ作成設定', 'ダミーデータ作成設定', 'edit_posts', 'dummy_post_generator', 'add_generator_menu', 'dashicons-smiley', 3);
}

function add_generator_menu() {
	if(isset($_POST['dummy_data_arr'])){
		$postdate = $_POST['dummy_data_arr'];
		make_dummy_img();
		make_post_data($postdate);
		make_archive_data($postdate);

	}
	include('include/add_page.php');
}

function make_dummy_img() {
	$path = wp_upload_dir();
	$dir_year = date('Y');
	$dir_month = date('m');
	$img_path = plugin_dir_path( __FILE__ ).'include/img/';
	$make_directory_path = $path['basedir']."/".$dir_year."/".$dir_month;
	$file_count = count(glob(plugin_dir_path( __FILE__ ).'include/img/*.jpg'));

	if( $file_count != 0) {
		for ($i=0; $i < $file_count; $i++) {
			copy($img_path.'dummy'.$i.'.jpg',$make_directory_path."/".'dummy'.$i.'.jpg');
		}
	}
}

function make_post_data($arr){
	$path = wp_upload_dir();
	$img = $path['baseurl']."/".date('Y')."/".date('m')."/";

	$add_post_content = "";

	if($arr['h1'] == "true"){
		$add_post_content .= "<h1>h1表示テスト</h1><br/>";
	}

	if($arr['h2'] == "true"){
		$add_post_content .= "<h2>h2表示テスト</h2><br/>";
	}

	if($arr['h3'] == "true"){
		$add_post_content .= "<h3>h3表示テスト</h3><br/>";
	}

	if($arr['h4'] == "true"){
		$add_post_content .= "<h4>h4表示テスト</h4><br/>";
	}

	if($arr['h5'] == "true"){
		$add_post_content .= "<h5>h5表示テスト</h5><br/>";
	}

	if($arr['h6'] == "true"){
		$add_post_content .= "<h6>h6表示テスト</h6><br/>";
	}

	if($arr['p'] == "true"){
		$add_post_content .= "<p>p表示テスト</p><br/>";
	}

	if($arr['ol'] == "true"){
		$add_post_content .= "<ol><li>olテスト</li><li>olテスト</li><li>olテスト</li><li>olテスト</li><li>olテスト</li></ol>";
	}

	if($arr['ul'] == "true"){
		$add_post_content .= "<ul><li>liテスト</li><li>liテスト</li><li>liテスト</li><li>liテスト</li><li>liテスト</li></ul>";
	}

	if($arr['wizimg'] == "true"){
		$add_post_content = $add_post_content."<img src=\"{$img}dummy0.jpg\" class=\"alignleft\" alt=\"\"><br/><img src=\"{$img}dummy1.jpg\" class=\"aligncenter\" alt=\"\"><br/><img src=\"{$img}dummy2.jpg\" class=\"alignright\" alt=\"\"><br/>";
	}

	// if($arr['eyecatch'] == "true"){
	// 	$post_arr = array(
	// 				'post_title'	=> "アイキャッチテスト投稿",
	// 				'post_date'		=> date('Y-m-d H:i:s'),
	// 				'post_content'	=> $add_post_content,
	// 				'post_status'	=> 'publish',
	// 		);
	// 	wp_insert_post( $post_arr );
	// }


	if($arr['date'] > 0 && !empty($arr['date'])) {
		for ($i=0; $i < $arr['date']; $i++) {

			$year = date('Y') - $i;

			for ($j=0; $j < 12; $j++) {
				global $wpdb;
				$num2 = $j +1;
				$month = date('m',strtotime('-'.$j.' month'));
				$post_arr = array(
							'post_title'	=> $year."年".$month."月テスト投稿",
							'post_date'		=> $year."-".$month."-01 00:00:00",
							'post_content'	=> $add_post_content,
							'post_status'	=> 'publish',
					);
				wp_insert_post( $post_arr );
			}

		}
	}
}

function make_archive_data($arr){
	global $wpdb;
	$cat_arr = array();

	//指定数分のカテゴリー情報を生成→配列に格納
	if($arr['category'] > 0) {
		for ($i=0; $i < $arr['category']; $i++) {
			$cat_no = $i + 1;
			$add_arr = array(
							'name' => 'カテゴリー'.$cat_no,
							'slug' => 'category'.$cat_no
							);
			array_push($cat_arr, $add_arr);
		}
	}

	foreach ($cat_arr as $value) {
			$wpdb->insert( $wpdb->prefix.'terms',$value);

			$slug = $value['slug'];
			$catId = $wpdb->get_results("SELECT term_id FROM {$wpdb->prefix}terms WHERE slug = '{$slug}';");

			$wpdb->query( $wpdb->prepare( 
				"
					INSERT INTO {$wpdb->term_taxonomy}
					( term_id, taxonomy)
					VALUES ( %d, %s )
				",
			        array(
					$catId[0]->term_id, 
					'category'
				)
			) );
	}
}


?>