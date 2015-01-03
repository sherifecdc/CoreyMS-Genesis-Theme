<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.1.2' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_google_fonts' );
function genesis_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700|Varela+Round', array(), CHILD_THEME_VERSION );

}

add_action( 'wp_enqueue_scripts', 'custom_scripts' );
function custom_scripts() {

	wp_enqueue_style( 'magnific-css', get_stylesheet_directory_uri() . '/css/magnific-popup.css' );
	wp_enqueue_script( 'magnific-js', get_stylesheet_directory_uri() . '/js/magnific.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'coreyms-js', get_stylesheet_directory_uri() . '/js/coreyms.js', array( 'jquery' ), '1.0.0', true );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Modify the WordPress read more link
add_filter( 'the_content_more_link', 'sp_read_more_link' );
function sp_read_more_link() {
	return '<div class="more-div"><a class="more-link" href="' . get_permalink() . '">Read more...</a></div>';
}

//* Remove default avatar that ships with genesis
remove_action( 'wp_head', 'genesis_load_favicon' );

//* Add custom avatar SVG before site_title
add_action( 'genesis_site_title', 'add_avatar', 9 );
function add_avatar() {
	?>
	<div class="site-avatar">
		<?php
		//Add Site Avatar SVG
		$siteAvatar =
			'<svg class="site-avatar-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="150px" height="150px" viewBox="0 0 441.5 441.5" enable-background="new 0 0 441.5 441.5" xml:space="preserve">
                    <g class="site-avatar-background">
                        <path fill="#56616B" d="M79.178 390.133C30.781 349.639 0 288.789 0 220.75C0 98.833 98.833 0 220.75 0S441.5 98.833 441.5 220.75 c0 63.558-26.86 120.842-69.848 161.12"/>
                    </g>
                    <g class="site-avatar-foreground">
                        <path fill="#E3E0DD" d="M254.602 182.291c0 1.992-0.097 4 0 6c0.057 0.88-0.093 1.952 0.194 2.78c0.22 0.631 0.69 1.12 1.704 1.273 c2.009 0.3 3.436-1.062 4.384-2.719c0.712-1.244 0.863-3.376 1.843-3.807c1.612-0.712 2.646-1.537 3.276-2.44 c1.903-2.732 0.09-6.185-0.723-9.42c-0.29-1.157-1.995-2.036-0.556-3.456c0.801-0.789 1.711-0.981 2.717-0.718 c0.164 0.043 0.33 0.095 0.5 0.162c0.262 0.104 0.505 0.185 0.732 0.249c3.521 0.99 3.182-2.499 3.459-4.337 c0.262-1.728 0.411-3.561-0.128-5.161c-0.413-1.229-1.231-2.321-2.721-3.124c-0.345-0.187-1.271 0.296-1.683 0.7 C260.971 165 252.55 170.8 254.65 182.291H254.602z"/>
                        <path fill="#E3E0DD" d="M121.076 185.062c-0.633 2.075-1.555 4.107-1.326 6.3c1.215 11.7 4.9 22.7 10.4 32.958 c1.692 3.201 3.6 6.4 6.3 8.931c6.878 6.299 15.1 11.5 18.3 21.101c0.697 2.1 2.7 3.799 4.1 5.616c0.797 1.101 7.7 7.5 9.9 9.06 c5.75 4 12.2 2.399 18.3 2.701c3.969 0.19 7.635-0.422 10.23-2.799c1.496-1.371 2.638-3.322 3.271-6.056 c0.378-1.636 1.506-3.308 2.812-4.621c0.372-0.374 0.756-0.724 1.144-1.028c0.236-0.187 0.452-0.393 0.683-0.584 c2.745-2.268 5.197-4.824 7.772-7.193c0.196-0.182 0.395-0.361 0.593-0.541c0.263-0.235 0.516-0.484 0.783-0.715 c2.067-1.778 3.228-4.668 5.456-6.357c0.991-0.751 2.192-1.268 3.781-1.339c4.19-0.188 7.815-1.231 10.56-3.522 c2.112-1.764 3.703-4.267 4.627-7.693c0.437-1.615 2.252-2.815 3.221-4.342c1.367-2.154 1.631-5.814-0.541-5.996 c-5.594-0.462-3.601-4.181-3.784-6.851c-0.224-3.178 0.817-6.237 1.688-9.293c2.23-7.859 2.068-15.447-2.718-22.497 c-1.593-2.346-2.862-4.882-3.588-7.658c-0.304-1.159-0.571-2.27 0.562-2.565c0.258-0.067 0.584-0.093 1.002-0.067 c0.979 0.081 2.138 1.205 2.97 0.79c0.196-0.099 0.377-0.282 0.53-0.589c0.812-1.632-0.619-3.176-1.769-4.355 c-1.974-2.029-2.121-3.545 0.03-5.829c4.014-4.26 2.55-9.908-3.036-11.764c-3.315-1.103-5.812-2.844-8.128-5.404 c-3.221-3.559-7.302-6.113-12.188-4.117c-0.077 0.031-0.152 0.054-0.229 0.087c-4.316 1.881-8.25 4.641-12.839 7.3 c5.969 2.5 11.4 4 17.4 3.326c4.219-0.484 7.9 0.8 10.7 4.1c1.021 1.2 1.1 2.8 0.1 4.197c-0.256 0.386-0.549 0.657-0.873 0.774 c-0.367 0.132-0.774 0.069-1.225-0.274c-4.875-3.503-10.354-1.259-15.552-1.665c-1.768-0.138-4.002 0.686-5.052-1.229 c-0.998-1.819-2.014-2.475-3.065-2.466c-1.199 0.009-2.443 0.886-3.757 1.931c-0.647 0.515-1.219 1.372-2.061 1.577 c-0.304 0.074-0.642 0.067-1.033-0.077c-0.107-2.153 2.641-2.457 2.183-4.465c-2.788-0.657-5.483-0.628-8.281 0.466 c-0.928 0.363-1.869 0.849-2.827 1.464c-0.095 0.061-0.188 0.107-0.283 0.17c0.945-3.138 5.419-5.098 0.606-7.558 c-0.949-0.485 0.189-1.66 1.02-2.292c1.043-0.794 2.321-1.519 2.936-2.594c1.521-2.665 3.594-4.347 5.997-5.363 c1.868-0.791 3.936-1.18 6.098-1.316c4.041-0.255 7.759-1.711 11.647-2.479c0.852-0.168 1.606-0.458 2.265-0.854 c1.858-1.119 2.911-3.136 2.915-6.033c0.009-6.685-2.918-12.743-3.582-19.266c-0.12-1.184-1.234-3.36-3.023-2.574 c-3.523 1.548-5.289-0.921-6.55-2.962c-1.631-2.64-3.149-2.745-4.879-1.815c-0.514 0.276-1.045 0.64-1.605 1.06 c-1.044 0.784-1.544 2.183-2.749 2.872c-0.285 0.163-0.596 0.298-0.977 0.362c-0.388-1.862 1.36-2.985 1.44-4.602 c0.051-1.008-0.054-2.516-1.327-1.745c-0.018 0.011-0.031 0.012-0.05 0.024c-0.144 0.092-0.273 0.166-0.403 0.24 c-2.564 1.457-2.537-0.535-2.866-2.284c-0.325-1.727-1.001-3.345-2.837-3.741c-0.406-0.087-0.729-0.082-0.991-0.007 c-1.147 0.325-1.128 1.968-1.773 2.907c-1.611 2.263-3.115 4.664-6.599 7.237c-0.113 0.083-0.21 0.166-0.328 0.25 c2.371-4.847 3.656-8.487 0.458-12.642c-0.07-0.09-0.129-0.18-0.203-0.271c-0.833 4.386-1.515 8.2-4.973 10.605 c-0.093 0.064-0.18 0.133-0.277 0.195c-1.097-1.5 0.22-3.408-1.72-4.438c-0.012-0.006-0.021-0.014-0.032-0.02 c-0.35 0.452-0.84 0.881-1.076 1.4c-1.153 2.642-1.673 3.754-2.146 4.263c-0.381 0.41-0.731 0.431-1.355 0.537 c-3.99 0.632-4.702-1.837-5.834-4.938c-2.642-7.239-9.918-10.402-14.395-6.815c-0.378 0.303-0.743 0.637-1.077 1.039 c-2.435 2.929-4.771 6.612-5.835 10c-1.345 4.336-3.751 6.76-7.148 8.956c-5.305 3.428-8.463 7.855-7.026 14.6 c0.539 2.542-0.675 4.875-1.846 7.1c-1.875 3.597-0.992 5.7 3.3 5.997c1.991 0.1 4 0.5 6 0.553c4.777 0.2 8.7 1.7 12.6 5 c3.784 3.3 6.8 7.3 10.6 10.378c3.999 3.3 5.2 6.9 4.6 11.811c-0.675 6.117-1.21 12.273-1.305 18.4 c-0.06 3.896-0.854 6.795-4.75 8.389c-1.934 0.791-3.424 2.349-2.862 4.699c0.609 2.5 2.7 3.2 5 3.1 c0.5-0.016 1.015-0.126 1.496-0.042c2.554 0.4 5.5 0.6 2.8 4.468c-0.756 1.058-0.791 2.3 0.8 2.8c1.242 0.4 3 0.2 2.5 2.2 c-0.369 1.521-2.162 1.237-3.3 1.809c-0.792 0.397-1.632 0.577-2.505 0.667c-1.329 0.138-2.731 0.069-4.149 0.233 c-1.444 0.167-2.903 0.575-4.315 1.699c0.827 0.264 1.74 0.504 2.708 0.726c8.333 1.914 20.87 2.433 20.086 3.987 c-0.007 0.015-0.021 0.03-0.031 0.045c-0.02 0.031-0.033 0.061-0.063 0.092h0.009v0.051c-4.351 0.46-8.029 1.064-12.392 1.2 c-1.847 0.066-3.692-0.031-4.682 1.264c-0.246 0.323-0.441 0.728-0.568 1.247c-0.572 2.399 1.2 4.101 2.9 5.399 c1.688 1.302 3.7 2.302 5.3 3.7c2.363 1.9 1.9 4.699 0.9 6.913c-0.278 0.625-0.608 0.995-0.969 1.202 c-1.229 0.705-2.845-0.562-4.213-0.901c-3.906-1.047-5.531-4.397-7.769-7.324c-4.868-6.364-7.044-12.982-16.966-15.704 c-0.459-0.125-0.913-0.253-1.406-0.362c-1.632-0.36-1.601-0.026-1.583-2c0.017-1.846 4.917-0.833 6.5-1.333 c5.514-1.741 5.65-2.834 10.5-4.167c3.46-0.951 2.169-6.663 1.322-10.273c-0.003-0.014-0.007-0.029-0.01-0.043 c-0.104-0.441-0.179-0.878-0.232-1.312c-0.361-2.919 0.352-5.695 1.408-8.45c6.845-10.339 3.558-20.753 4.884-23.425 c0.777-1.565 1.148-2.989 1.094-4.267c-0.092-2.177-1.423-3.929-4.123-5.227c-7.634-3.67-15.45-6.876-23.707-8.9 c-1.792-0.439-3.357-0.107-4.359 1.482c-0.006 0.009-0.013 0.016-0.019 0.025c-1.01 1.628-1.361 3.475-0.355 5.2 c0.944 1.6 2.6 1 4 1c5.133-0.093 10.274-0.174 15.4 0.045c3.086 0.1 3.9 1.8 2.4 4.722c-0.343 0.664-0.82 1.233-1.384 1.709 c-2.594 2.19-7.13 2.328-10.065-0.209c-0.722-0.629-1.141-1.751-2.391-1.317c-0.15 0.052-0.262 0.125-0.365 0.204 c-0.378 0.292-0.477 0.754-0.492 1.357c-0.035 1.376-0.479 2.212-1.139 2.757c-1.51 1.246-4.167 0.963-5.775 2.043 c-1.373 0.908-3.125-1.413-3.536-3.282c-0.312-1.417-0.514-2.734-2.291-2.62c-0.586 0.038-1.049 0.236-1.412 0.534 c-0.625 0.514-0.948 1.329-1.06 2.166c-0.39 2.976-0.977 6.3 0.9 8.741C123.411 174.752 122.676 179.853 121.076 185.062z M211.68 211.557c0.16-0.005 0.319-0.011 0.479-0.017c0.196-0.006 0.401-0.005 0.61 0c1.39 0.026 2.971 0.134 3.738-1.328 c0.028-0.053 0.064-0.089 0.09-0.146c0.049-0.119 0.086-0.232 0.113-0.341c0.398-1.586-1.396-2.169-2.316-3.113 c-0.159-0.163-0.322-0.34-0.462-0.523c-0.389-0.508-0.595-1.069 0.001-1.558c0.515-0.422 1.704-0.564 2.294-0.258 c3.199 1.7 4.7 0.5 5.533-2.735c0.286-1.132 1.02-1.809 1.979-1.574c0.325 0.079 0.677 0.262 1.047 0.568 c2.446 2 4.8 4.2 5.601 7.437c0.483 2 0.5 4.07-1.045 5.7c-1.617 1.698-3.396 0.774-5.011-0.143 c-2.403-1.37-4.178-0.281-5.707 1.436c-3.979 4.466-8.223 8.75-11.737 13.601c-3.714 5.086-8.537 5.843-14.104 5.198 c-0.648-0.075-1.368-0.171-1.786-0.653c-0.114-0.131-0.209-0.285-0.27-0.482c-0.37-1.215 0.587-1.834 1.458-2.285 c2.948-1.527 5.975-2.908 8.896-4.486c1.887-1.021 3.851-2.061 5.402-3.496c1.875-1.738 5.248-3.51 4.134-6.221 c-0.141-0.343-0.323-0.6-0.535-0.794c-1.383-1.272-4.106 0.29-6.09 0.26c-4.13-0.028-8.242-0.928-12.342-0.218h-0.023v-0.073 c0.004-0.002 0.008-0.003 0.012-0.005c0.007-0.003 0.014-0.006 0.021-0.009c0.814-0.378 1.633-0.717 2.458-1.021 c2.471-0.91 4.987-1.504 7.531-1.902c0.032-0.005 0.064-0.011 0.096-0.016c0.033-0.005 0.065-0.009 0.098-0.014 C205.084 211.85 208.374 211.669 211.68 211.557z M194.177 187.948c3.15 2.3 4 6 2.9 6.258h-0.062 c-2.208-0.583-2.876-3.92-5.816-4.751c-0.006-0.001-0.012-0.005-0.018-0.007c-3.767-1.083-9.077-8.666-9.81-13.188 c-0.011-0.066-0.031-0.139-0.04-0.204c-0.012-0.087-0.008-0.164-0.016-0.249c-0.02-0.205-0.042-0.413-0.039-0.601 c0-0.001 0-0.001 0-0.002c0.001-0.067 0.017-0.102 0.025-0.152c0.146-0.854 1.329 0.547 2.516 2.208 c1.004 1.406 2.003 2.98 2.358 3.487c0.982 1.393 1.82 2.389 2.686 3.229C190.297 185.367 191.808 186.328 194.177 187.948z"/>
                        <path fill="#E3E0DD" d="M397.368 309.241c-0.261-0.421-0.515-0.851-0.789-1.251c-0.119-0.172-0.252-0.329-0.374-0.498 c-0.355-0.493-0.713-0.985-1.097-1.449c-1.061-1.284-2.228-2.461-3.529-3.541c-9.653-8.013-20.562-14.354-29.925-22.777 c-5.18-4.66-11.315-8.287-16.289-13.133c-3.436-3.346-6.821-6.178-11.363-7.746c-12.746-4.402-25.297-9.318-37.806-14.363 c-5.212-2.104-8.992-6.655-14.148-8.286c-5.011-1.585-9.368-3.845-13.188-7.062c-1.195-1.008-2.342-2.103-3.436-3.309 c-0.236-0.263-0.504-0.511-0.797-0.736c-1.041-0.805-2.462-1.286-4.507-0.657c2.625 3 6.2 4.898 6.2 8.75 c0.029 10.375-1.518 20.563-4.211 30.575c-0.283 1.058-0.617 2.509-2.144 2.399c-0.126-0.014-0.231-0.047-0.34-0.078 c-1.058-0.322-1.254-1.564-1.737-2.489c-1.168-2.226 0.229-5.108-1.879-7.075c-4.517-4.214-4.992-10.279-7.05-15.604 c-0.729-1.892 0.104-4.437-2.731-5.277c-0.006-0.003-0.013-0.006-0.021-0.008c-2.953-0.86-3.546 1.873-5.052 3.187 c-8.374 7.295-12.026 18.521-21.318 25.2c-8.297 5.931-16.328 12.183-26.8 13.716c-2.79 0.407-5.649 0.323-8.459 0.627 c-1.733 0.188-3.997-0.093-4.459 2.299c-0.365 1.899 1.1 3.102 2.5 3.949c1.73 1 3.1 2.899 4.7 3.578 c3.386 1.398 2.6 2.698 0.7 4.5c-2.543 2.476-3.724 4.93-0.872 8.198c1.765 2.021-0.304 4.5-1.314 5.711 c-0.307 0.367-0.615 0.511-0.923 0.513c-1.023 0.006-2.039-1.625-2.944-2.394c-0.887-0.75-1.582-1.731-2.484-2.459 c-1.267-1.021-2.576-2.888-4.149-2.603c-0.405 0.072-0.826 0.281-1.27 0.691c-2.076 1.9 0 3.9 1.4 5.602 c4.511 5.563 8.05 11.524 8.194 19.838c0 0.056 0.005 0.106 0.006 0.162c-3.156-2.711-6.338-4.35-8.485-7.479 c-1.777-2.588-3.426-5.543-6.256-7.043c-7.64-4.051-12.329-9.996-14.186-18.574c-1.413-6.529-1.927-13.146-3.01-19.693 c-1.136-6.866-2.037-13.854-5.661-20.014c-2.048-3.479-4.663-4.494-8.15-1.59c-3.831 3.191-7.883 6.066-11.413 9.674 c-8.022 8.195-15.606 17.19-26.436 21.801c-11.449 4.848-17.431 13.926-21.416 24.898c-4.198 11.539-5.315 23.633-6.518 35.768 c-1.136 11.451-1.973 22.699 1.5 34c0.259 0.869 0.56 1.72 0.86 2.569c1.22 3.454 2.781 6.741 4.682 9.873 c0.035 0.03 0.07 0.062 0.105 0.09c0.259 0.216 0.513 0.438 0.773 0.653c38.203 31.621 87.228 50.627 140.694 50.627 c53.438 0 102.44-18.985 140.635-50.577c3.521-2.911 6.94-5.938 10.272-9.06c-2.618-3.158-5.301-6.254-8.485-8.67 c-7.959-6.028-17.794-8.264-27.218-11.09c-0.239-0.071-0.48-0.144-0.719-0.215c-0.01-0.004-0.019-0.006-0.026-0.009 c-0.019-0.006-0.035-0.012-0.054-0.019c-0.25-0.076-0.492-0.154-0.724-0.235c-0.029-0.011-0.058-0.021-0.087-0.032 c-0.207-0.074-0.405-0.148-0.598-0.228c-0.136-0.056-0.261-0.113-0.389-0.171c-0.07-0.031-0.144-0.062-0.21-0.094 c-2.793-1.33-3.677-3.312-2.927-7.151c0.733-3.767 2.284-6.832 4.471-9.828c5.71-7.841 12.521-14.705 19.023-21.845 c7.076-7.768 15.928-13.119 25.398-17.319c7.65-3.396 10.099-2.508 15.7 3.799c0.678 0.8 1.1 2.196 3.093 1.354 c0.002-0.002 0.004-0.002 0.007-0.002C397.742 309.809 397.549 309.533 397.368 309.241z"/>
                    </g>
                </svg>';

		//Put anchor tag around Site Avatar
		$link = sprintf( '<a href="%s">%s</a>', trailingslashit( home_url() ), $siteAvatar );

		//Echo Avatar
		echo $link;
		?>
	</div>
<?php
}

//* Add custom avatar SVG before site_title
add_action( 'genesis_site_description', 'add_social_links', 11 );
function add_social_links() {
	?>
	<div class="social-links-div">
		<ul>
			<li class="social-links-li">
				<a class="social-link social-youtube" href="https://www.youtube.com/user/schafer5">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
					     viewBox="0 0 100 100" style="height: 40px; width: 40px;">
						<circle class="outer-shape" cx="50" cy="50" r="48"></circle>
						<path class="inner-shape" style="opacity: 1; fill: rgb(255, 255, 255);"
						      transform="translate(25,25) scale(0.5)"
						      d="M97.284,26.359c-1-5.352-5.456-9.346-10.574-9.839c-12.221-0.784-24.488-1.42-36.731-1.428 c-12.244-0.007-24.464,0.616-36.687,1.388c-5.137,0.497-9.592,4.47-10.589,9.842C1.567,34.058,1,41.869,1,49.678 s0.568,15.619,1.703,23.355c0.996,5.372,5.451,9.822,10.589,10.314c12.226,0.773,24.439,1.561,36.687,1.561 c12.239,0,24.515-0.688,36.731-1.479c5.118-0.497,9.574-5.079,10.574-10.428C98.43,65.278,99,57.477,99,49.676 C99,41.88,98.428,34.083,97.284,26.359z M38.89,63.747V35.272l26.52,14.238L38.89,63.747z"></path>
					</svg>
				</a>
			</li>
			<li class="social-links-li">
				<a class="social-link social-github" href="https://github.com/CoreyMSchafer">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
					     viewBox="0 0 100 100" style="height: 40px; width: 40px;">
						<circle class="outer-shape" cx="50" cy="50" r="48"></circle>
						<path class="inner-shape" style="opacity: 1; fill: rgb(255, 255, 255);"
						      transform="translate(25,25) scale(0.5)"
						      d="M50,1C22.938,1,1,22.938,1,50s21.938,49,49,49s49-21.938,49-49S77.062,1,50,1z M79.099,79.099 c-3.782,3.782-8.184,6.75-13.083,8.823c-1.245,0.526-2.509,0.989-3.79,1.387v-7.344c0-3.86-1.324-6.699-3.972-8.517 c1.659-0.16,3.182-0.383,4.57-0.67c1.388-0.287,2.855-0.702,4.402-1.245c1.547-0.543,2.935-1.189,4.163-1.938 c1.228-0.75,2.409-1.723,3.541-2.919s2.082-2.552,2.847-4.067s1.372-3.334,1.818-5.455c0.446-2.121,0.67-4.458,0.67-7.01 c0-4.945-1.611-9.155-4.833-12.633c1.467-3.828,1.308-7.991-0.478-12.489l-1.197-0.143c-0.829-0.096-2.321,0.255-4.474,1.053 c-2.153,0.798-4.57,2.105-7.249,3.924c-3.797-1.053-7.736-1.579-11.82-1.579c-4.115,0-8.039,0.526-11.772,1.579 c-1.69-1.149-3.294-2.097-4.809-2.847c-1.515-0.75-2.727-1.26-3.637-1.532c-0.909-0.271-1.754-0.439-2.536-0.503 c-0.782-0.064-1.284-0.079-1.507-0.048c-0.223,0.031-0.383,0.064-0.478,0.096c-1.787,4.53-1.946,8.694-0.478,12.489 c-3.222,3.477-4.833,7.688-4.833,12.633c0,2.552,0.223,4.889,0.67,7.01c0.447,2.121,1.053,3.94,1.818,5.455 c0.765,1.515,1.715,2.871,2.847,4.067s2.313,2.169,3.541,2.919c1.228,0.751,2.616,1.396,4.163,1.938 c1.547,0.543,3.014,0.957,4.402,1.245c1.388,0.287,2.911,0.511,4.57,0.67c-2.616,1.787-3.924,4.626-3.924,8.517v7.487 c-1.445-0.43-2.869-0.938-4.268-1.53c-4.899-2.073-9.301-5.041-13.083-8.823c-3.782-3.782-6.75-8.184-8.823-13.083 C9.934,60.948,8.847,55.56,8.847,50s1.087-10.948,3.231-16.016c2.073-4.899,5.041-9.301,8.823-13.083s8.184-6.75,13.083-8.823 C39.052,9.934,44.44,8.847,50,8.847s10.948,1.087,16.016,3.231c4.9,2.073,9.301,5.041,13.083,8.823 c3.782,3.782,6.75,8.184,8.823,13.083c2.143,5.069,3.23,10.457,3.23,16.016s-1.087,10.948-3.231,16.016 C85.848,70.915,82.88,75.317,79.099,79.099L79.099,79.099z"></path>
					</svg>
				</a>
			</li>
			<li class="social-links-li">
				<a class="social-link social-gplus" title="YouTube"
				   href="https://plus.google.com/+CoreySchafer44/posts">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
					     viewBox="0 0 100 100" style="height: 40px; width: 40px;">
						<circle class="outer-shape" cx="50" cy="50" r="48"></circle>
						<path class="inner-shape" style="opacity: 1; fill: rgb(255, 255, 255);"
						      transform="translate(25,25) scale(0.5)"
						      d="M1.079,84.227c-0.024-0.242-0.043-0.485-0.056-0.73C1.036,83.742,1.055,83.985,1.079,84.227z M23.578,55.086 c8.805,0.262,14.712-8.871,13.193-20.402c-1.521-11.53-9.895-20.783-18.701-21.046C9.264,13.376,3.357,22.2,4.878,33.734 C6.398,45.262,14.769,54.823,23.578,55.086z M98.999,25.501v-8.164c0-8.984-7.348-16.335-16.332-16.335H17.336 c-8.831,0-16.078,7.104-16.323,15.879c5.585-4.917,13.333-9.026,21.329-9.026c8.546,0,34.188,0,34.188,0l-7.651,6.471H38.039 c7.19,2.757,11.021,11.113,11.021,19.687c0,7.201-4.001,13.393-9.655,17.797c-5.516,4.297-6.562,6.096-6.562,9.749 c0,3.117,5.909,8.422,8.999,10.602c9.032,6.368,11.955,12.279,11.955,22.15c0,1.572-0.195,3.142-0.58,4.685h29.451 C91.652,98.996,99,91.651,99,82.661V31.625H80.626v18.374h-6.125V31.625H56.127V25.5h18.374V7.127h6.125V25.5H99L98.999,25.501z M18.791,74.301c2.069,0,3.964-0.057,5.927-0.057c-2.598-2.52-4.654-5.608-4.654-9.414c0-2.259,0.724-4.434,1.736-6.366 c-1.032,0.073-2.085,0.095-3.17,0.095c-7.116,0-13.159-2.304-17.629-6.111v6.435l0.001,19.305 C6.116,75.76,12.188,74.301,18.791,74.301L18.791,74.301z M1.329,85.911c-0.107-0.522-0.188-1.053-0.243-1.591 C1.141,84.858,1.223,85.389,1.329,85.911z M44.589,92.187c-1.442-5.628-6.551-8.418-13.675-13.357 c-2.591-0.836-5.445-1.328-8.507-1.36c-8.577-0.092-16.566,3.344-21.074,8.457c1.524,7.436,8.138,13.068,16.004,13.068h27.413 c0.173-1.065,0.258-2.166,0.258-3.295C45.007,94.502,44.86,93.329,44.589,92.187z"></path>
					</svg>
				</a>
			</li>
			<li class="social-links-li">
				<a class="social-link social-twitter" href="https://twitter.com/CoreyMSchafer">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
					     viewBox="0 0 100 100" style="height: 40px; width: 40px;">
						<circle class="outer-shape" cx="50" cy="50" r="48"></circle>
						<path class="inner-shape" style="opacity: 1; fill: rgb(255, 255, 255);"
						      transform="translate(25,25) scale(0.5)"
						      d="M99.001,19.428c-3.606,1.608-7.48,2.695-11.547,3.184c4.15-2.503,7.338-6.466,8.841-11.189 c-3.885,2.318-8.187,4-12.768,4.908c-3.667-3.931-8.893-6.387-14.676-6.387c-11.104,0-20.107,9.054-20.107,20.223 c0,1.585,0.177,3.128,0.52,4.609c-16.71-0.845-31.525-8.895-41.442-21.131C6.092,16.633,5.1,20.107,5.1,23.813 c0,7.017,3.55,13.208,8.945,16.834c-3.296-0.104-6.397-1.014-9.106-2.529c-0.002,0.085-0.002,0.17-0.002,0.255 c0,9.799,6.931,17.972,16.129,19.831c-1.688,0.463-3.463,0.71-5.297,0.71c-1.296,0-2.555-0.127-3.783-0.363 c2.559,8.034,9.984,13.882,18.782,14.045c-6.881,5.424-15.551,8.657-24.971,8.657c-1.623,0-3.223-0.096-4.796-0.282 c8.898,5.738,19.467,9.087,30.82,9.087c36.982,0,57.206-30.817,57.206-57.543c0-0.877-0.02-1.748-0.059-2.617 C92.896,27.045,96.305,23.482,99.001,19.428z"></path>
					</svg>
				</a>
			</li>
			<li class="social-links-li">
				<a class="social-link social-linkedin" href="https://www.linkedin.com/in/coreymschafer">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
					     viewBox="0 0 100 100" style="height: 40px; width: 40px;">
						<circle class="outer-shape" cx="50" cy="50" r="48"></circle>
						<path class="inner-shape" style="opacity: 1; fill: rgb(255, 255, 255);"
						      transform="translate(25,25) scale(0.5)"
						      d="M82.539,1H17.461C8.408,1,1,8.408,1,17.461v65.078C1,91.592,8.408,99,17.461,99h65.078C91.592,99,99,91.592,99,82.539 V17.461C99,8.408,91.592,1,82.539,1z M37.75,80.625H25.5V37.75h12.25V80.625z M31.625,31.625c-3.383,0-6.125-2.742-6.125-6.125 s2.742-6.125,6.125-6.125s6.125,2.742,6.125,6.125S35.008,31.625,31.625,31.625z M80.625,80.625h-12.25v-24.5 c0-3.383-2.742-6.125-6.125-6.125s-6.125,2.742-6.125,6.125v24.5h-12.25V37.75h12.25v7.606c2.526-3.47,6.389-7.606,10.719-7.606 c7.612,0,13.782,6.856,13.782,15.312L80.625,80.625L80.625,80.625z"></path>
					</svg>
				</a>
			</li>
			<li class="social-links-li">
				<a class="social-link social-rss" href="http://coreyms.com/feed/">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
					     viewBox="0 0 100 100" style="height: 40px; width: 40px;">
						<circle class="outer-shape" cx="50" cy="50" r="48"></circle>
						<path class="inner-shape" style="opacity: 1; fill: rgb(255, 255, 255);"
						      transform="translate(25,25) scale(0.5)"
						      d="M14.044,72.866C6.848,72.866,1,78.736,1,85.889c0,7.192,5.848,12.997,13.044,12.997c7.223,0,13.062-5.804,13.062-12.997 C27.106,78.736,21.267,72.866,14.044,72.866z M1.015,34.299v18.782c12.229,0,23.73,4.782,32.392,13.447 C42.057,75.172,46.832,86.725,46.832,99h18.865C65.697,63.321,36.672,34.3,1.015,34.299L1.015,34.299z M1.038,1v18.791 C44.657,19.792,80.16,55.329,80.16,99H99C99,44.979,55.048,1,1.038,1z"></path>
					</svg>
				</a>
			</li>
		</ul>
	</div>
<?php
}

//* Enable the superfish script
add_filter( 'genesis_superfish_enabled', '__return_true' );
