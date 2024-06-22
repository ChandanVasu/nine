<?php

function ocdi_import_files() {
  return [
      [
          'import_file_name'           => 'News 1',
          'categories'                 => ['All'],
          'import_file_url'            => 'https://mjnnu.com/demo/demofile/news/papernews.xml',
          'import_preview_image_url'   => 'https://mjnnu.com/demo/demofile/news/papernews',
          'preview_url'                => 'https://paper.mjnnu.com/news/',
      ],
      [
          'import_file_name'           => 'News 2',
          'categories'                 => ['News'],
          'import_file_url'            => 'https://mjnnu.com/demo/demofile/news/papernews.xml',
          'import_preview_image_url'   => 'https://themesvillage.com/wp-content/uploads/2020/11/Screenshot-2020-11-20-100407.png',
          'preview_url'                => 'https://paper.mjnnu.com/news/',
      ],
  ];
}
add_filter('ocdi/import_files', 'ocdi_import_files');

function ocdi_after_import_setup() {
  // Ensure the function is available before using it
  if (function_exists('activate_plugin')) {
      // Check if Elementor is active by looking for a known class
      if (!class_exists('Elementor\Plugin')) {
          // If Elementor is not active, attempt to activate it
          activate_plugin('elementor/elementor.php');
      }

      // Check if Nine Core is active by looking for a known class or function
      if (!class_exists('Nine_Core')) {
          // If Nine Core is not active, attempt to activate it
          activate_plugin('nine-core/nine-core.php');
      }
  }
}
add_action('ocdi/after_import', 'ocdi_after_import_setup');

function ocdi_register_required_plugins($plugins) {
  $plugins = [
      [
          'name'     => 'Elementor',
          'slug'     => 'elementor',
          'required' => true,
      ],
      [
          'name'         => 'Nine Core',
          'slug'         => 'nine-core',
          'source'       => 'https://vasu-main-folder.s3.ap-south-1.amazonaws.com/Envato+Market/Theme+Plugin/nine-core.zip',
          'required'     => true,
          'version'      => '0.1',
      ],
  ];

  return $plugins;
}
add_filter('ocdi/register_plugins', 'ocdi_register_required_plugins');

