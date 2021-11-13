/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function(config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = 'http://localhost:8080/research/public/editor/ckfinder/ckfinder.html';

    config.filebrowserUploadUrl = 'http://localhost:8080/research/public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

    config.filebrowserImageBrowseUrl = 'http://localhost:8080/research/public/editor/ckfinder/ckfinder.html?type=Images';

    config.filebrowserFlashBrowseUrl = 'http://localhost:8080/research/public/editor/ckfinder/ckfinder.html?type=Flash';

    config.filebrowserImageUploadUrl = 'http://localhost:8080/research/public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

    config.filebrowserFlashUploadUrl = 'http://localhost:8080/research/public/editor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};