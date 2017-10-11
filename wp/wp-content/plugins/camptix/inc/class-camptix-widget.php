<?php
/**
 * Example vCard widget
 */
class Camptix_Widgets extends WP_Widget {
  private $fields = array(
    'title'          => 'タイトル',
  );

  public function __construct() {
    $widget_ops = array( 'classname' => 'camptix_widgets', 'description' => __( 'Use this widget to add a vCard', 'wordfes2017' ) );

    $this->WP_Widget( 'camptix_widgets', __( '受付一覧ウィジェット', 'wordfes2017' ), $widget_ops );
    $this->alt_option_name = 'camptix_widgets';

    add_action( 'save_post', array( &$this, 'flush_widget_cache' ) );
    add_action( 'deleted_post', array( &$this, 'flush_widget_cache' ) );
    add_action( 'switch_theme', array( &$this, 'flush_widget_cache' ) );
  }

  public function widget( $args, $instance ) {
    $cache = wp_cache_get( 'camptix_widgets', 'widget' );

    if ( ! is_array( $cache ) ) {
      $cache = array();
    }

    if ( ! isset( $args['widget_id'] ) ) {
      $args['widget_id'] = null;
    }

    if ( isset( $cache[$args['widget_id']] ) ) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract( $args, EXTR_SKIP );

    //$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( '参加申し込み', 'wordfes2017' ) : $instance['title'], $instance, $this->id_base );

    foreach ( $this->fields as $name => $label ) {
      if ( ! isset( $instance[$name] ) ) { $instance[$name] = ''; }
    }

    echo $before_widget;

    if ( $title ) {
      echo $before_title, $title, $after_title;
    }

    $camptix = $GLOBALS['camptix'];
  ?>
  <div class="participate-contents">
    <?php
    $unsold_seat = $camptix->get_remaining_tickets( '1224' , true );
    $all_seat    = get_post_meta( '1224', 'tix_quantity', true );
     ?>
<style>
h2{
margin: 0;
padding: 5px;
background: #ea5514;
font-size: 1.43rem;
color: #fff;
font-weight: bold;
line-height: 1.1;
box-sizing: border-box;
text-align: center;
}
h4{border-bottom: 2px solid #ea5514;
color: #ea5514;
font-family: "じゅん 34", "Jun 34";
font-size: 1.43rem;
padding: 10px;
margin-top: 40px;
margin-bottom: 20px;
font-weight: bold;
line-height: 1.1;
box-sizing: border-box;
word-wrap: break-word;
text-align: left;
}
</style>
    </br>
    <h2>参加申し込み</h2>
    <h4 class="participate-title" style="margin-top: 10px">セッション</h4>
    <table>
      <tbody>
        <tr>
          <th>参加者数</th>
          <td> <?php echo esc_html( $all_seat - $unsold_seat ); ?> / <?php echo esc_attr( $all_seat ); ?></td>
        </tr>
        <tr>
          <th>締め切り</th>
          <td>10月27日(金)</td>
        </tr>
        <tr>
          <th>料金</th>
          <td>無料</td>
        </tr>
      </tbody>
    </table>
    <?php
    $unsold_seat = $camptix->get_remaining_tickets( '1228' , true );
    $all_seat    = get_post_meta( '1228', 'tix_quantity', true );
     ?>
    <h4 class="participate-title">セッション + 懇親会</h4>
    <table>
      <tbody>
        <tr>
          <th>参加者数</th>
          <td> <?php echo esc_html( $all_seat - $unsold_seat ); ?> / <?php echo esc_attr( $all_seat ); ?></td>
        </tr>
        <tr>
          <th>締め切り</th>
          <td>10月15日(水)</td>
        </tr>
        <tr>
          <th>料金</th>
          <td>4,000円</td>
        </tr>
      </tbody>
    </table>
    <?php
    $unsold_seat = $camptix->get_remaining_tickets( '1230' , true );
    $all_seat    = get_post_meta( '1230', 'tix_quantity', true );
     ?>
    <h4 class="participate-title">セッション + 懇親会 + 宿泊</h4>
    <table>
      <tbody>
        <tr>
          <th>参加者数</th>
          <td> <?php echo esc_html( $all_seat - $unsold_seat ); ?> / <?php echo esc_attr( $all_seat ); ?></td>
        </tr>
        <tr>
          <th>締め切り</th>
          <td>10月10日(水)</td>
        </tr>
        <tr>
          <th>料金</th>
          <td>8,000円</td>
        </tr>
      </tbody>
    </table>
    </br>
    <p class="text-center">
      <a href="<?php echo site_url( '/entry/' ) ?>" class="btn btn-warning btn-lg"><i class="glyphicon glyphicon-flag"></i> ENTRY</a>
    </p>
  </div>
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set( 'camptix_widgets', $cache, 'widget' );
  }

  public function update( $new_instance, $old_instance ) {
    $instance = array_map( 'strip_tags', $new_instance );

    $this->flush_widget_cache();

    $alloptions = wp_cache_get( 'alloptions', 'options' );

    if ( isset( $alloptions['camptix_widgets'] ) ) {
      delete_option( 'camptix_widgets' );
    }

    return $instance;
  }

  public function flush_widget_cache() {
    wp_cache_delete( 'camptix_widgets', 'widget' );
  }

  public function form( $instance ) {
    foreach ( $this->fields as $name => $label ) {
      ${$name} = isset( $instance[$name] ) ? esc_attr( $instance[$name] ) : '';
    ?>
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( $name ) ); ?>"><?php _e( "{$label}:", 'wordfes2017' ); ?></label>
      <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $name ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $name ) ); ?>" type="text" value="<?php echo ${$name}; ?>">
    </p>
    <?php
    }
  }
}


function register_camptix_widget(){
  register_widget( 'Camptix_Widgets' );
}

add_action( 'widgets_init', 'register_camptix_widget' );
