<?php
/**
 * Add your images (logo, background, etc...) inside /mu-plugins/assets
 * then change LOGO_FILE, BACKGROUND_FILE name and extension (if needed).
 * Update fill color hex code inside ticker.svg with your primary/main color.
 */
define('LOGO', get_stylesheet_directory_uri() . '/assets/img/42digital-logo.png');
define('BACKGROUND', get_stylesheet_directory_uri() . '/assets/img/background.jpg');
define('TICKER', get_stylesheet_directory_uri() . '/assets/img/ticker.svg');

/**
 * Edit styles as needed inside mb_login_style
 */
function mb_login_style() { ?>
  <style type="text/css">
    /* Admin CSS Variables */
    :root {
      --mb-login-clr-primary: #4D9CD5;
      --mb-login-clr-primary-clearer: #66b6d2;
    }

    /* Background styles */
    .login {
      min-height: 100%;
      background: linear-gradient(90deg, rgba(8, 16, 21, .85), rgba(8, 16, 21, .85)), url("<?php echo BACKGROUND; ?>");
      background-size: cover;
    }

    /* Logo styles: change logo width and height as needed */
    #login h1 a,
    .login h1 a {
      background-image: url("<?php echo LOGO; ?>");
      width: 214px;
      height: 128px;
      background-size: 214px 128px;
      background-repeat: no-repeat;
    }

    /* A tag focus */
    .login a:focus {
      box-shadow: 0 0 0 1px var(--mb-login-clr-primary), 0 0 2px 1px var(--mb-login-clr-primary-clearer) !important;
    }

    /* Button and Button Primary focus */
    .login .button-primary:focus,
    .login .button:focus {
      box-shadow: 0 0 0 1px #fff, 0 0 0 3px var(--mb-login-clr-primary) !important;
    }

    /* Inputs styles: username, password and remember-me inputs */
    .login input[type=text]:focus,
    .login input[type=password]:focus,
    .login input[type=checkbox]:focus {
      border-color: var(--mb-login-clr-primary);
      box-shadow: 0 0 0 1px var(--mb-login-clr-primary);
      outline: 2px solid transparent;
    }

    /* Icon inside password input styles */
    .login .dashicons-visibility,
    .login .dashicons-hidden {
      color: var(--mb-login-clr-primary);
    }

    /* Focus styles for hide password button */
    .login .button.wp-hide-pw:focus {
      border-color: var(--mb-login-clr-primary) !important;
      box-shadow: 0 0 0 1px var(--mb-login-clr-primary) !important;
      outline: 2px solid transparent;
    }

    /* Ticker styles for remember-me checkbox when checked */
    .login .forgetmenot input[type=checkbox]:checked::before {
      content: url("<?php echo TICKER; ?>");
    }

    /* #nav and #backtoblog link styles on hover */
    .login #nav a:hover,
    .login #nav a:focus,
    .login #backtoblog a:hover,
    .login #backtoblog a:focus {
      color: var(--mb-login-clr-primary) !important;
      box-shadow: 0 0 0 1px var(--mb-login-clr-primary), 0 0 2px 1px var(--mb-login-clr-primary-clearer) !important;
    }

    /* Submit button styles */
    .login .button-primary {
      background: var(--mb-login-clr-primary) !important;
      border-color: var(--mb-login-clr-primary) !important;
    }

    /* Privacy Policy link styles */
    .login .privacy-policy-link {
      color: var(--mb-login-clr-primary);
    }

    /* Language switcher styles: on focus */
    .login .language-switcher select:focus {
      border-color: var(--mb-login-clr-primary);
      color: var(--mb-login-clr-primary);
      box-shadow: 0 0 0 1px var(--mb-login-clr-primary);
    }

    /* Language switcher styles: on hover */
    .login .language-switcher select:hover {
      color: var(--mb-login-clr-primary);
    }

    /* Language switcher styles: on focus */
    .login .language-switcher select:focus {
      border-color: var(--mb-login-clr-primary) !important;
      color: var(--mb-login-clr-primary) !important;
      box-shadow: 0 0 0 1px var(--mb-login-clr-primary) !important;
    }

    /* Reset Firefox inner outline that appears on :focus. */
    /* This ruleset overrides the color change on :focus thus needs to be after select:focus. */
    .login .language-switcher select:-moz-focusring {
      text-shadow: 0 0 0 var(--mb-login-clr-primary) !important;
    }

    /* Remove background focus style from IE11 while keeping focus style available on option elements. */
    .login .language-switcher select:hover::-ms-value {
      color: var(--mb-login-clr-primary) !important;
    }

    .login .language-switcher select:focus::-ms-value {
      color: var(--mb-login-clr-primary) !important;
    }

    /* Language switcher styles: submit button */
    .login .language-switcher input[type=submit] {
      color: var(--mb-login-clr-primary);
      border-color: var(--mb-login-clr-primary);
      background: #f6f7f7;
      vertical-align: top;
    }

    /* Loged out message styles */
    .login .message {
      border-left: 4px solid var(--mb-login-clr-primary) !important;
    }
  </style>
<?php }

add_action('login_enqueue_scripts', 'mb_login_style');

/**
 * Login logo URL: redirect to home page
 */
function mb_login_logo_url() {
  return home_url();
}
add_filter('login_headerurl', 'mb_login_logo_url');