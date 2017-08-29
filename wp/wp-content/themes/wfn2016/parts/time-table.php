<?php

/**
 * Time Table
 * =====================================================
 * @package    WordPress
 * @subpackage wordfes2015
 * @author     WordBench Nagoya
 * @license    GPLv2 or Later
 * @link       http://2015.wordfes.org
 * @copyright  2015 WordBench Nagoya
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
				$stage_terms = get_terms( 'classroom', array( 'hide_empty' => false, 'orderby' => 'order' ) );
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
			<th>10:40〜11:00</th>
			<td>開会式</td>
			<td class="hidden-xs"></td>
			<td class="hidden-xs"></td>
			<td class="hidden-xs"></td>
		</tr>
		<tr class="session1">
			<th><strong>─ SESSION1 ─</strong><br />
			<?php
			$start_time = get_field( 'pdc-timezone-start', 'timezone_7' );
			$end_time   = get_field( 'pdc-timezone-end', 'timezone_7' );
			
			echo esc_html( $start_time . ' 〜 ' . $end_time );
			?>
			</th>
			<?php
			foreach ( $stage_terms as $stage_key => $stage ) {
				wordfes2016_timetable_meta( 'tz-03', $stage );
			}
			?>
		</tr>

		<tr>
			<th>11:45〜13:15</th>
			<td class="rest">昼食休憩（90分）<br /><a href="/wanted/lunch/">Lunch MeetUp!</a><br class="visible-xs"><span class="visible-xs">5214教室</span></td>
			<td class="rest hidden-xs">昼食休憩（90分）</td>
			<td class="rest hidden-xs">昼食休憩（90分）<!-- <a href="http://2014.wordfes.org/sessions/lunch-workshop/">ランチタイムハンズオン</a> --></td>
			<td class="rest hidden-xs">昼食休憩（90分）</td>
		</tr>

		<tr class="session2">
			<th><strong>─ SESSION2 ─</strong><br />
			<?php
			$start_time = get_field( 'pdc-timezone-start', 'timezone_9' );
			$end_time   = get_field( 'pdc-timezone-end', 'timezone_9' );
			
			echo esc_html( $start_time . ' 〜 ' . $end_time );
			?>
			</th>
			<?php
			foreach ( $stage_terms as $stage_key => $stage ) {
				wordfes2016_timetable_meta( 'tz-05', $stage );
			}
			?>
		</tr>



		<tr>
			<th>14:00〜14:15</th>
			<td colspan="5" class="rest">休憩</td>
		</tr>
		<tr class="session3">

			<th><strong>─ SESSION3 ─</strong><br />
			<?php
			$start_time = get_field( 'pdc-timezone-start', 'timezone_11' );
			$end_time   = get_field( 'pdc-timezone-end', 'timezone_11' );
			
			echo esc_html( $start_time . ' 〜 ' . $end_time );
			?>
			</th>
			<?php
			foreach ( $stage_terms as $stage_key => $stage ) {
				wordfes2016_timetable_meta( 'tz-07', $stage );
			}
			?>
		</tr>

		<tr>
			<th>15:00〜15:15</th>
			<td colspan="4" class="rest">休憩</td>
		</tr>

		<tr class="session4">
			<th><strong>─ SESSION4 ─</strong><br />
			<?php
			$start_time = get_field( 'pdc-timezone-start', 'timezone_13' );
			$end_time   = get_field( 'pdc-timezone-end', 'timezone_13' );
			
			echo esc_html( $start_time . ' 〜 ' . $end_time );
			?>
			</th>
			<?php
			foreach ( $stage_terms as $stage_key => $stage ) {
				wordfes2016_timetable_meta( 'tz-09', $stage );
			} ?>
		</tr>

		<tr>
			<th><strong>─ LT大会 ─</strong><br />
				16:05〜16:50
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
			<th scope="row">8/28 (日)<br>9:00〜</th>
<!-- 			<td><a href="http://2014.wordfes.org/inuyama-tour/">2日目ツアー：未定</a></td> -->
			<td>宿泊組はソピア・キャビンで現地解散</td>
		</tr>
	</table>
	</div><!-- .table-responsive -->

	</div><!-- .section-inner -->
	
</div><!-- .section -->
<?php


function wordfes2016_timetable_meta( $timezone, $stage ){

	if ( ! $timezone || ! $stage ) {
		return;
	}
	
	if ( $stage->slug !== 'challenge-stage' ) : ?>

		<td class="<?php echo esc_html( $stage->slug ); ?>">
			<dl>
			<?php
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
			
			foreach ( $session_args as $session_key => $session ) {
				
				
			?>
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
				
					<i class="glyphicon glyphicon-user"></i> <?php echo esc_html( $speaker ) ?><br>
					
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
					<?php //wordfes2016_entry_footer(); ?>
				</dd>
			<?php
			}
			?>
			</dl>
		</td>

	<?php else : ?>

		<td class="<?php echo esc_html( $stage->slug ); ?>">
			<dl>

			<?php
			$session_args = get_posts(
				array(
					'post_type'      => 'sessions',
					'post_status' => array( 'publish', 'private' ),
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

			foreach ( $session_args as $session_key => $session ) { ?>
				<dt><a href="<?php echo esc_url( get_the_permalink( $session->ID ) ); ?>"><?php echo esc_html( $session->post_title ) ?></a></dt>
				<dd>
					<i class="glyphicon glyphicon-user"></i> <?php echo esc_html( get_field( 'session_speaker_name', $session->ID ) ) ?><br>
					<span class="visible-xs visible-sm grenn"><?php echo esc_html( $stage->name ); ?></span>
<!-- 					<i class="level_<?php wordfes2014_the_term( $session->ID, 'target', 'slug' );?> level_icon"><?php wordfes2014_the_term( $session->ID, 'target' );?></i> -->
					<?php wordfes2016_post_edit_link( $session->ID ); ?>
				</dd>
			<?php
			}
			?>
			</dl>
		</td>

		<td class="<?php echo esc_html( $stage->slug ); ?>">
			<dl>
			<?php
			$session_args = get_posts(
				array(
					'post_type'      => 'sessions',
					'post_status' => array( 'publish', 'private' ),
					'offset' => 1,
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

			foreach ( $session_args as $session_key => $session ) { ?>
				<dt><a href="<?php echo esc_url( get_the_permalink( $session->ID ) ); ?>"><?php echo esc_html( $session->post_title ) ?></a></dt>
				<dd>
					<i class="glyphicon glyphicon-user"></i> <?php echo esc_html( get_field( 'session_speaker_name', $session->ID ) ) ?><br>
					<span class="visible-xs visible-sm grenn"><?php echo esc_html( $stage->name ); ?>(<?php echo esc_html( $stage->description ); ?>）</span>
					<i class="level_<?php wordfes2014_the_term( $session->ID, 'target', 'slug' );?> level_icon"><?php wordfes2016_the_term( $session->ID, 'target' );?></i>
					<?php wordfes2016_post_edit_link( $session->ID ); ?>
				</dd>
			<?php
			}
			?>
			</dl>
		</td>
	<?php
	endif;
}
