(function() {
	tinymce.create('tinymce.plugins.yr_namespace', {
		init : function(ed, url) {
			img_url = url+'/button.png';
			ed.addButton('yr_namespace', {
				title : 'Private',
				image : img_url,
				onclick : function() {
					ed.selection.setContent('[private]' + ed.selection.getContent() + '[/private]');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function(){
			return {
				longname: 'Stresslimit custom button',
				author: '@stresslimit',
				authorurl: 'http://stresslim.it/',
				infourl: 'http://twitter.com/stresslimit',
				version: "1.0"
			};
		}
	});
	tinymce.PluginManager.add('yr_namespace', tinymce.plugins.yr_namespace);
})();