<?php
/*
Plugin Name: AI Content Generator
Description: Simple AI content generator plugin using AJAX
Version: 1.0
Author: Rabiul Islam 
*/

if (!defined('ABSPATH')) exit;

// Admin Menu
add_action('admin_menu', function() {
    add_menu_page(
        'AI Generator',
        'AI Generator',
        'manage_options',
        'ai-generator',
        'ai_generator_page'
    );
});

// Enqueue Script
add_action('admin_enqueue_scripts', function() {
    wp_enqueue_script('ai-js', plugin_dir_url(__FILE__) . 'admin.js', ['jquery'], null, true);
    wp_localize_script('ai-js', 'ai_ajax', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
});

// Admin Page UI
function ai_generator_page() {
    ?>
    <div class="wrap">
        <h1>AI Content Generator</h1>
        <textarea id="prompt" rows="5" style="width:100%;" placeholder="Enter prompt..."></textarea>
        <br><br>
        <button id="generate" class="button button-primary">Generate</button>
        <h3>Result:</h3>
        <div id="result"></div>
    </div>
    <?php
}

// AJAX Handler
add_action('wp_ajax_generate_ai_content', function() {
    $prompt = sanitize_text_field($_POST['prompt']);

    // Demo AI response (you can replace with OpenAI API later)
    $response = "Generated content for: " . $prompt;

    echo $response;
    wp_die();
});