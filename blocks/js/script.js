(function( $ ) {
	'use strict';

		$('#button-addon2').click( function(e) {
			e.preventDefault();
	
			$.ajax({
				url : newsletter_form.ajaxUrl,
				type: 'post',
				dataType: 'json',
				data: {
					action : 'newsletter',
					nonce : newsletter_form.newsLetterNonce,
					email: $('#email').val(),
				},
				beforeSend: function(){
					$('.frm-message').show().removeClass(['alert-danger','alert-success', 'd-none']).text('Sending...');
					$('#button-addon2').prop('disabled', true);
				}})
				.done( function(res) {
					const noticeClass = res.status === 1 ? 'alert-success' : 'alert-danger';
					$('.frm-message').removeClass([['alert-danger','alert-success', 'd-none']]).addClass(noticeClass).text(res.message);
				})
				.always(function(){
					$('#button-addon2').prop('disabled', false);
					$('#newsletter')[0].reset();
				})
		})

})( jQuery );