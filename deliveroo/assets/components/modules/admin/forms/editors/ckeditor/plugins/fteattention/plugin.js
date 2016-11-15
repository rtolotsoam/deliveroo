
CKEDITOR.plugins.add( 'fteattention', {

	icons: this.path + 'icons/fteattention.png',

	init: function( editor ) {

		editor.addCommand( 'insertFteattention', {

			exec: function( editor ) {
				editor.insertHtml( "<hr><h3 class='titre'><i class='faire'><img src='../assets/images/attention.png '></i> ATTENTION</h3><br><h5 style='background-color:yellow; color:red;'>TEXTE EN ATTENTION</h5>" );
			}
		});

		editor.ui.addButton( 'Attention', {
			label: 'Inserer Attention',
			command: 'insertFteattention',
			toolbar: 'fte',
			icon: this.path + 'icons/fteattention.png'
		});
	}
});
