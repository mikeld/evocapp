<div class="vlt-form-group">
	<div class="vlt-custom-checkbox-wrap">
		<input class="vlt-custom-checkbox" type="checkbox" required name="gdpr_terms" id="gdpr_terms" value="1">
		<label for="gdpr_terms" class="vlt-custom-checkbox-label">
			<?php
				if ( $termsUrl ) {
					echo sprintf( __( 'I accept the %sTerms and Conditions%s and the %sPrivacy Policy%s *', 'leedo' ), '<a href="' . $termsUrl . '" target="_blank">', '</a>', '<a href="' . $privacyPolicyUrl . '" target="_blank">', '</a>' );
				} else {
					echo sprintf( __( 'I accept the %sPrivacy Policy%s *', 'leedo' ), '<a href="' . $privacyPolicyUrl . '" target="_blank">', '</a>');
				}
			?>
		</label>
	</div>
</div>