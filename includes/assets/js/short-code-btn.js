(function() {
    tinymce.PluginManager.add('mybutton', function( editor, url ) {
        editor.addButton( 'mybutton', {
            text: tinyMCE_object.button_name,
            icon: false,
            onclick: function() {
                editor.windowManager.open( {
                    title: tinyMCE_object.button_title,
                    body: [
                        {
                            type   : 'listbox',
                            name   : 'columnnumber',
                            label  : 'Select Column per row',
                            values : [
                                { text: '1 Column', value: '12' },
                                { text: '2 Columns', value: '6' },
                                { text: '3 Columns', value: '4' },
                                { text: '4 Columns', value: '3' },
                                { text: '6 Columns', value: '2' }
                            ],
                            value : '4' // Sets the default
                        },
                        {
                            type   : 'listbox',
                            name   : 'postorder',
                            label  : 'Select post order',
                            values : [
                                { text: 'ASC', value: 'ASC' },
                                { text: 'DESC', value: 'DESC' }
                            ],
                            value : 'DESC' // Sets the default
                        },
                        {
                            type   : 'textbox',
                            name   : 'postsperpage',
                            label  : 'Posts per page',
                            tooltip: 'Put only intiger value',
                            value  : '6'
                        }
                    ],
                    onsubmit: function( e ) {
                        editor.insertContent( '[apbd_portfolios column_number="' + e.data.columnnumber + '" order="' + e.data.postorder + '" posts_per_page="' + e.data.postsperpage + '"]');
                    }
                });
            },
        });
    });
 
})();