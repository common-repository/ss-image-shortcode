
(function(){

	tinymce.create('tinymce.plugins.ss', {

		createControl : function(id, controlManager) {
			if (id == 'ss_button') {

				var button = controlManager.createButton('ss_button', {
					title : 'SS', // title of the button
					image : '../wp-content/plugins/ss-image-shortcode/admin/ss_shortcode.png',  // path to the button's image
					onclick : function() {
						// triggers the thickbox
						var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
						W = W - 80;
						H = H - 84;
						tb_show( 'SS Image shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=ss-form' );
					}
				});
				return button;
			}
			return null;
		}
	});
	
	tinymce.PluginManager.add('ss', tinymce.plugins.ss);
	jQuery(function(){

		var form = jQuery('<div id="ss-form"><table id="ss-table" class="form-table">\
			<tr>\
				<th><label for="ss-size">Size</label></th>\
				<td><select name="size" id="ss-size">\
					<option value="one-fourth">One Fourth</option>\
					<option value="one-third">One Third</option>\
					<option value="one-half">One Half</option>\
					<option value="full-width">Full Width</option>\
				</select><br />\
				<small>Specify the image size to be displayed.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ss-last">Last Image</label></th>\
				<td><select name="last" id="ss-last">\
					<option value="no">No</option>\
					<option value="yes">Yes</option>\
				</select><br />\
				<small>Select Yes if this is the last image of the row.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ss-title">Title</label></th>\
				<td><input type="text" id="ss-title" value="Image Title"/><br />\
				<small>Title of this image</small></td>\
			</tr>\
			<tr>\
				<th><label for="ss-caption">Caption</label></th>\
				<td><input type="text" id="ss-caption" value="Paste the caption content here"/><br />\
				<small>Insert the caption content</small></td>\
			</tr>\
			<tr>\
				<th><label for="ss-background">Caption Background</label></th>\
				<td><select name="background" id="ss-background">\
					<option value="red">Red</option>\
					<option value="blue">Blue</option>\
					<option value="yellow">Yellow</option>\
					<option value="green">Green</option>\
					<option value="orange">Orange</option>\
					<option value="violet">Violet</option>\
					<option value="pink">Pink</option>\
					<option value="skyblue">Sky Blue</option>\
					<option value="grey">Grey</option>\
					<option value="brown">Brown</option>\
					<option value="black">Black</option>\
					<option value="white">White</option>\
				</select><br />\
				<small>Caption Background Color.</small></td>\
			</tr>\
			<tr>\
				<th><label for="ss-textcolor">Text color</label></th>\
				<td><select name="textcolor" id="ss-textcolor">\
					<option value="red">Red</option>\
					<option value="blue">Blue</option>\
					<option value="yellow">Yellow</option>\
					<option value="green">Green</option>\
					<option value="orange">Orange</option>\
					<option value="violet">Violet</option>\
					<option value="pink">Pink</option>\
					<option value="skyblue">Sky Blue</option>\
					<option value="grey">Grey</option>\
					<option value="brown">Brown</option>\
					<option value="black">Black</option>\
					<option value="white">White</option>\
				</select><br />\
				<small>Select the color of the caption text</small></td>\
			</tr>\
			<tr>\
				<th><label for="ss-content">Content</label></th>\
				<td><input type="text" id="ss-content" value="Paste Image Here" /><br />\
				<small>Insert the image. you may replace this value later</small></td>\
			</tr>\
		</table>\
		<div style="margin-top: 20px; margin-bottom: 20px;">\
		Are you Looking for a professional version with multiple effects and more customization options? <a target="_blank" href="http://codecanyon.net/item/fx-image-shortcode/3822233?ref=miguras">FX Image Shortcode</a>\
		</div>\
		<div style="margin-top: 20px; margin-bottom: 20px;">\
		More professional plugins:  <a target="_blank" href="http://codecanyon.net/user/miguras/portfolio?ref=miguras">Miguras Portfolio</a>\
		</div>\
		<p class="submit">\
			<input type="button" id="ss-submit" class="button-primary" value="Insert shortcode" name="submit" />\
		</p>\
		</div>\
		');
		
		var table = form.find('table');
		form.appendTo('body').hide();
		form.find('#ss-submit').click(function(){

			var options = { 
				'size'    : '',
				'title'         : '',
				'last'         : '',
				'caption'         : '',
				'background'       : '',
				'textcolor'       : '',
				};
				
			var content = table.find('#ss-content').val();
				
			var shortcode = '[ss_shortcode';
			
			for( var index in options) {
				var value = table.find('#ss-' + index).val();
				if ( value !== options[index] )
					shortcode += ' ' + index + '="' + value + '"';
			}
			
			shortcode += ']' + content + '[/ss_shortcode]';
			tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);
			tb_remove();
		});
	});
})()