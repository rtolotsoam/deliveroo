
CKEDITOR.plugins.add( 'ftefaire', {

	icons: this.path + 'icons/ftefaire.png',

	init: function( editor ) {

		editor.addCommand( 'insertFtefaire', {

			exec: function( editor ) {
				var now = new Date();
				editor.insertHtml( "<h3 class='titre'><i class='faire'><img src='../assets/images/faire.png '></i> A FAIRE </h3><br><h4 class='titre1'>A FAIRE</h4><br>" );
			}
		});

		editor.ui.addButton( 'Faire', {
			label: 'Inserer Faire',
			command: 'insertFtefaire',
			toolbar: 'fte',
			icon: this.path + 'icons/ftefaire.png'
		});
	}
});
