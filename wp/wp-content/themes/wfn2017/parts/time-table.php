<?php

/**
 * Time Table
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2017
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2017.wordfes.org
 * @copyright  2017 WordBench Nagoya
 * =====================================================
 */

?>

<div class="section text-center">
	
	<div class="section-inner text-left clearfix">
		
	<p>お断り: セッションの内容は、予告なしに変更される場合がございます。予めご了承ください</p>
	<p>お断り: リンクが貼られていないページは、内容が確定しておりません。情報が確定し次第、詳細ページを掲載いたします。</p>
	<!-- <p class="visible-xs" style="font-weight: bold; color: #c33;">※タイムテーブルは横にスクロールします。</p> -->
	<div>
	<table class="table table-bordered time-table">
		<col class="time" width="20%">
		<col class="stage1" width="20%">
		<col class="stage2" width="20%">
		<col class="stage3" width="20%">
		<col class="stage4" width="20%">
		<thead>
			<tr class="hidden-sm hidden-xs">
				<th class="classroom">名　称</th>
				<?php
				// classroom
				$stage_terms = get_terms( 'classroom', array( 'hide_empty' => false, 'orderby' => 'order' ) );
				foreach ( $stage_terms as $stage_key => $stage ) { ?>
						<th class="classroom stage<?php echo esc_attr( $stage_key ) + 1; ?>">
							<?php echo esc_attr( $stage->name ); ?><br />
							<!-- （<?php //echo esc_attr( $stage->description ); ?>） -->
						</th>
				<?php
				}
				?>
			</tr>
			<tr class="hidden-sm hidden-xs ">
				<th>定　員</th>
				<?php
				// persons
				//$stage_terms = get_terms( 'classroom', array( 'hide_empty' => false, 'orderby' => 'order' ) );
				foreach ( $stage_terms as $stage_key => $stage ) { ?>
						<th class="persons">
							<?php echo esc_html( get_field( 'classroom_persons', $stage ) ); ?>
						</th>
				<?php
				}
				?>
			</tr>
		</thead>
		<tr class="hidden-sm hidden-xs">
			<th>
			</th>
			<td class="stage1">
			<a href="http://www.ustream.tv/channel/WordBench-Nagoya" target="_blank">Ustream (ネット中継)</a>
			</td>
			<td class="stage2">
			<a href="http://www.ustream.tv/channel/WordFes" target="_blank">Ustream (ネット中継)</a>
			</td>
			<td class="stage3">
			<a href="http://www.ustream.tv/channel/WordFes2" target="_blank">Ustream (ネット中継)</a>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr class="hidden-sm hidden-xs">
			<th>
			</th>
			<td colspan="3">
 			<small>※ Ustream 放送や YouTube の詳細は<a href="/topics/1267/">こちらをご覧ください</a>。</small>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<th>10:00〜</th>
			<td colspan="4" class="rest">開場</td>

		</tr>

		<tr>
			<th>10:30〜10:45</th>
			<td>開会式</td>
			<td class="hidden-xs"></td>
			<td class="hidden-xs"></td>
			<td class="hidden-xs"></td>
		</tr>
		
		<tr class="session1">
			<?php wordfes2017_set_timetable( $stage_terms, 'tz-03'); ?>
		</tr>
	
		<tr class="session2">
			<?php wordfes2017_set_timetable( $stage_terms, 'tz-05'); ?>
		</tr>

		<tr>
			<th>11:45〜13:00</th>
			<td class="rest">昼食休憩（75分）<br /><a href="/wanted/lunch/">Lunch MeetUp!</a><br class="visible-xs"><span class="visible-xs">5214教室</span></td>
			<td class="rest hidden-xs">昼食休憩（75分）</td>
			<td class="rest hidden-xs">昼食休憩（75分）<!-- <a href="http://2017.wordfes.org/sessions/lunch-workshop/">ランチタイムハンズオン</a> --></td>
			<td class="rest hidden-xs">昼食休憩（75分）</td>
		</tr>

		<tr class="session3">
			<?php wordfes2017_set_timetable( $stage_terms, 'tz-07'); ?>
		</tr>
		
		<tr class="session4">
			<?php wordfes2017_set_timetable( $stage_terms, 'tz-09'); ?>
		</tr>
		
		<tr>
			<th>14:00〜14:15</th>
			<td colspan="4" class="rest">休憩</td>
		</tr>

		<tr class="session5">
			<?php wordfes2017_set_timetable( $stage_terms, 'tz-11'); ?>
		</tr>

		<tr class="session6">
			<?php wordfes2017_set_timetable( $stage_terms, 'tz-13'); ?>
		</tr>

		<tr>
			<th>15:00〜15:15</th>
			<td colspan="4" class="rest">休憩</td>
		</tr>
		<tr class="session7">
			<?php wordfes2017_set_timetable( $stage_terms, 'tz-15'); ?>
		</tr>

		<tr class="session8">
			<?php wordfes2017_set_timetable( $stage_terms, 'tz-17'); ?>
		</tr>
				
		<tr>
			<th><strong>─ LT大会 ─</strong><br />
				16:10〜16:50
			</th>
			<td>LT大会</td>
			<td class="hidden-xs">&nbsp;</td>
			<td class="hidden-xs">&nbsp;</td>
			<td class="hidden-xs">&nbsp;</td>
		</tr>
	</table>
	</div><!-- .table-responsive -->
	
	<div>
	<table class="table table-bordered time-table">
		<col class="col" width="20%">
		<tr>
			<th scope="row">16:50〜17:30</th>
			<td>懇親会会場へ移動</td>
		</tr>
		<tr>
			<th scope="row">17:30〜19:30</th>
			<td>懇親会</td>
		</tr>
		<tr>
			<th scope="row">19:45〜20:00</th>
			<td>バス乗車</td>
		</tr>
		<tr>
			<th scope="row">20:45〜21:15</th>
			<td>ソピア・キャビン到着</td>
		</tr>
	</table>
	</div><!-- .table-responsive -->
	
	<div>
	<table class="table table-bordered time-table">
		<col class="col" width="20%">
		<tr>
			<th scope="row">10/29 (日)<br>9:00〜</th>
<!-- 			<td><a href="http://2014.wordfes.org/inuyama-tour/">2日目ツアー：未定</a></td> -->
			<td>宿泊組はソピア・キャビンで現地解散</td>
		</tr>
	</table>
	</div><!-- .table-responsive -->

	</div><!-- .section-inner -->
	
</div><!-- .section -->

<?php
function wordfes2017_timetable_meta( $timezone, $stage ){
	
	static $ses_array;
	
	if ( ! is_array( $ses_array ) ) {
		
		$ses_array = array();
		
	}

	if ( ! $timezone || ! $stage ) {
		return;
	}
	
	if ( is_user_logged_in() ) {
		
		$status = array( 'publish', 'draft', 'private' );
		
	} else {
		
		$status = array( 'publish', 'draft' );
		
	}
	
	$session_args = get_posts(
		array(
			'post_type'      => 'sessions',
			'post_status'    => $status,
			'posts_per_page' => 1,
			'tax_query'      => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'timezone',
					'field'    => 'slug',
					'terms'    => $timezone,
				),
				array(
					'taxonomy' => 'classroom',
					'field'    => 'id',
					'terms'    => $stage->term_id,
				),
			)
		)
	);
	
	$ses_id  = $session_args[0]->ID;
	$ses_tzs = get_the_terms( $ses_id, 'timezone' );
	
	if ( false !== array_search( $ses_id, $ses_array ) ) {
		
		return;
		
	} elseif ( null != $ses_id ) {
		
		$ses_array[] = $ses_id;
		
	}
	
	if ( 1 < count( $ses_tzs ) ) {
		
		$rowspan = 'rowspan="' . count( $ses_tzs ) . '"';
		
	} else {
		
		$rowspan = '';
		
	}
	
	
?>
		<td class="<?php echo esc_html( $stage->slug ); ?>" <?php echo $rowspan; ?>>
		<?php foreach ( $session_args as $session_key => $session ): ?>
			<dl>
				<dt>
					<?php if ( 'draft' != $session->post_status ): ?>
					<a href="<?php echo esc_url( get_the_permalink( $session->ID ) ); ?>">
					<?php endif; ?>
						<?php echo esc_html( $session->post_title ) ?>
					<?php if ( 'draft' != $session->post_status ): ?>
					</a>
					<?php endif; ?>
				</dt>
				<dd>
				<?php if ( $speaker = get_field( 'session_speaker_name', $session->ID ) ): ?>
				
					<i class="glyphicon glyphicon-user"></i> <?php echo wp_kses_post( $speaker ) ?><br>
					
				<?php endif; ?>
					<span class="visible-xs visible-sm"><?php echo esc_html( $stage->name ); ?></span>
					<p class="target">
			<?php
				$target_terms = wp_get_post_terms( $session->ID, 'target', array('orderby' => 'order', 'order' => 'DESC') );
				foreach ( $target_terms as $key => $target ) {
			?>
            			<span class="level_<?php echo esc_html( $target->slug );?> level_icon"><?php echo esc_html( $target->name );?></span><br class="hidden-xs">
			<?php
				}
			?>
					</p>
					<?php //wordfes2017_entry_footer(); ?>
				</dd>
			</dl>
		<?php endforeach; ?>
		</td>
<?php
} // End Function

function wordfes2017_set_timetable( $stage_terms, $tz_slug ) {
	
	$tz_obj     = get_term_by( 'slug', $tz_slug, 'timezone' );
	$tz_id      = 'timezone_' . $tz_obj->term_id;
	$start_time = get_field( 'pdc-timezone-start', $tz_id );
	$end_time   = get_field( 'pdc-timezone-end',   $tz_id );
?>
	<th>
		<?php echo esc_html( $start_time . ' 〜 ' . $end_time ); ?>
	</th>
<?php
	foreach ( $stage_terms as $stage_key => $stage ) {
	
		wordfes2017_timetable_meta( $tz_slug, $stage );
	
	}
	
} // End Function
