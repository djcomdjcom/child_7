<?php

/*
Plugin Name: Profile Company
Plugin URI: http://www.djcom.jp/
Description: 会社概要登録プラグイン
Author: KATO Yoshitaka
Author URI:
Version: 1.1.3
Date：20241018
*/

// Exit If Accessed Directly
if ( !defined( 'ABSPATH' ) ) exit;

add_action( 'admin_menu', 'hublog_company_profile' );
add_action( 'admin_init', 'register_company_profile_settings' );

$fieldname_prefix = 'profile_';

function register_company_profile_settings() {
    global $fieldname_prefix;

    // グローバル変数として参照
    global $inputfileds;

    foreach ( $inputfileds as $key => $value ) {
        $option_name = $fieldname_prefix . $value[0];
        register_setting('company_profile_group', $option_name);
    }
}

function hublog_company_profile() {
    add_theme_page( 'hublog_company_profile', '会社概要', 'manage_options', 'custom_menu_page', 'hublog_company_profile_page' );
}

function company_profile_inputfield( $title, $fieldname, $fieldtype, $note = '' ) {
    global $fieldname_prefix;

    $example_output = sprintf( "<code>get_option('%s%s')</code>", $fieldname_prefix, $fieldname );
    $table_head = '<th scope="row"><strong>' . $title . '</strong>';

    if ( $note ) {
        $table_head .= '(' . $note . ')';
    }

    $table_head .= "<br />\n" . $example_output . "</th>";

    if ( $fieldtype == 'text' ) {
        $output[] = $table_head;
        $output[] = sprintf( "<td><input type=\"text\" size=\"40\" name=\"%s%s\" value=\"%s\" /></td>", $fieldname_prefix, $fieldname, esc_attr( get_option( $fieldname_prefix . $fieldname ) ) );
    } elseif ( $fieldtype == 'textarea' ) {
        $output[] = $table_head;
        $output[] = sprintf( "<td><textarea cols=\"60\" rows=\"3\" name=\"%s%s\">%s</textarea></td>", $fieldname_prefix, $fieldname, esc_textarea( get_option( $fieldname_prefix . $fieldname ) ) );
    } elseif ( $fieldtype == 'checkbox' ) {
        $checked = get_option( $fieldname_prefix . $fieldname ) ? 'checked' : '';
        $output[] = $table_head;
        $output[] = sprintf( "<td><input type=\"checkbox\" name=\"%s%s\" value=\"1\" %s /></td>", $fieldname_prefix, $fieldname, $checked );
    }

    if ( $output ) {
        echo '<tr valign="middle">' . join( "\n", $output ) . '</tr>';
        return $fieldname_prefix . $fieldname;
    }
}

if ( !function_exists( 'sc_get_option_func' ) ) {
    function sc_get_option_func( $atts, $content = null ) {
        extract( shortcode_atts( array(
            'key' => '',
            'separator' => ', ',
        ), $atts ) );

        if ( "" != $key ) {
            if ( is_array( post_custom( $key ) ) ) {
                return implode( $separator, get_option( $key ) );
            } else {
                return get_option( $key );
            }
        }
    }
    add_shortcode( 'sc_get_option', 'sc_get_option_func' );
}

// グローバル変数として$inputfiledsを定義する
global $inputfileds;
$inputfileds = array(
    '商号' => array( 'corporate_name', 'text' ),
    '屋号' => array( 'shop_name', 'text' ),
    '代表取締役' => array( 'president', 'text' ),
    '郵便番号' => array( 'postcode', 'text' ),
    '所在地/住所' => array( 'address', 'text' ),
    '電話番号(代表)' => array( 'main_tel', 'text' ),
    '代表番号 非表示' => array( 'main_tel_hide', 'checkbox', '0:表示 1:非表示' ),
    '電話番号(問い合わせ窓口)' => array( 'inquiry_tel', 'text' ),
    '問合せ番号 非表示' => array( 'inquiry_tel_hide', 'checkbox', '0:表示 1:非表示' ),
    'FAX番号' => array( 'fax', 'text' ),
    '営業所' => array( 'branch', 'textarea' ),
    '関連会社' => array( 'group', 'textarea' ),
    '業種' => array( 'industry', 'textarea' ),
    '業務内容' => array( 'business_content', 'textarea' ),
    '従業員数' => array( 'employeenumber', 'textarea' ),
    '資格' => array( 'qualifications', 'textarea' ),
    '免許番号' => array( 'licentiate', 'textarea' ),
    '創立年月日' => array( 'foundation_date', 'text' ),
    '設立年月日' => array( 'establishment_date', 'text' ),
    '資本金' => array( 'capital_amount', 'text' ),
    '写真' => array( 'photo', 'textarea' ),
    '協力会社' => array( 'cooperative', 'textarea' ),
    '技術導入' => array( 'technic', 'textarea' ),
    '瑕疵保証' => array( 'warranty', 'textarea' ),
    '所属団体' => array( 'organization', 'textarea' ),
    '保証協会/保険協会' => array( 'guaranty_society', 'textarea' ),
    '主要取引先' => array( 'main_client', 'textarea' ),
    '主要取引銀行' => array( 'bank_of_account', 'textarea' ),
    '営業時間' => array( 'opening_hours', 'text' ),
    '定休日' => array( 'holiday', 'text' ),
    '地図' => array( 'googlemap', 'textarea', '修正が必要な場合は入力' ),
    'アクセス' => array( 'googlemap-access', 'textarea', '地図に付随するテキスト' ),
    '地図.2' => array( 'googlemap02', 'textarea', '追加の地図がある場合入力' ),
    'アクセス.2' => array( 'googlemap-access02', 'textarea', '地図に付随するテキスト' ),
    'お問合せ用メールアドレス' => array( 'inquiry_mail', 'text' ),
    'ホームページURL' => array( 'url', 'text' ),
    '定期点検ページURL' => array( 'teikitenken', 'text' ),
    'ライン公式アカウントのID' => array( 'sns_line', 'text' ),
    'facebookのURL' => array( 'sns_fb', 'text' ),
    'twitterのURL' => array( 'sns_tw', 'text' ),
    'InstagramのURL' => array( 'sns_ig', 'text' ),
    'PintarestのURL' => array( 'sns_pin', 'text' ),
    'youtubeチャンネルのURL' => array( 'sns_ytch', 'text' ),
    'SNSその他1のURL' => array( 'sns01', 'text' ),
    'SNSその他2のURL' => array( 'sns20', 'text' ),
    'プライバシーポリシー制定日' => array( 'privacy_date', 'text' ),
    '注文住宅商品名' => array( 'product_order', 'text' ),
    'リノベーション商品名' => array( 'product_renov', 'text' ),
    'リフォーム商品名' => array( 'product_reform', 'text' ),
    'フォームID：一般お問合せ（数字のみ入力）' => array( 'form_inquiry', 'text' ),
    'フォームID：イベント申し込み（数字のみ入力）' => array( 'form_event', 'text' ),
    'フォームID：モデルハウス（数字のみ入力）' => array( 'form_modelhouse', 'text' ),
    'フォームID：資料請求（数字のみ入力）' => array( 'form_shiryou', 'text' ),
    'フォームID：求人のお問合わせ（数字のみ入力）' => array( 'form_recruit', 'text' ),
    'フォームID：求人（社員）（数字のみ入力）' => array( 'form_recruit_shain', 'text' ),
    'フォームID：求人（パート）（数字のみ入力）' => array( 'form_recruit_part', 'text' ),
    'ZEH普及実績と今後の目標' => array( 'zeh_achievement', 'textarea', '例）2020年度　戸建住宅の総建築数に対するZEH実績値は100％' ),
);

function hublog_company_profile_page() {
    global $fieldname_prefix, $inputfileds;

    ?>
    <div class="wrap">
        <h2>会社概要</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'company_profile_group' );
            do_settings_sections( 'company_profile_group' );
            ?>
            <table class="form-table">
                <?php
                $page_options = array();
                foreach ( $inputfileds as $key => $value ) {
                    $value0 = isset($value[0]) ? $value[0] : '';
                    $value1 = isset($value[1]) ? $value[1] : '';
                    $value2 = isset($value[2]) ? $value[2] : '';

                    $page_options[] = company_profile_inputfield($key, $value0, $value1, $value2);
                }
                ?>
            </table>
            <input type="hidden" name="page_options" value="<?php echo join(',', $page_options); ?>" />
            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>
        </form>
        <div class="sample-code">
            <h3>サンプルソース（本文組み込み用）</h3>
            <textarea cols="100" rows="40" wrap="off">
            <table>
                <?php foreach ( $inputfileds as $key => $value ) : if ( get_option($fieldname_prefix . $value[0]) ) : ?>
                    <tr>
                        <th class="<?php echo $value[0]; ?> profile_key"><?php echo $key; ?></th>
                        <td class="<?php echo $value[0]; ?> profile_value">[sc_get_option key=<?php echo $fieldname_prefix . $value[0]; ?>]</td>
                    </tr>
                <?php endif; endforeach; ?>
            </table>
            </textarea>
        </div>
    </div>
    <?php
}
