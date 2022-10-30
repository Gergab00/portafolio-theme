/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { 
	useBlockProps,
	MediaUpload,
	InspectorControls,
	__experimentalLinkControl as LinkControl,
	} from '@wordpress/block-editor';
import { 
	TextControl,
	Button,
	PanelBody,
	} from '@wordpress/components';

const ALLOWED_MEDIA_TYPES = [ 'image' ];

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {

	//console.log('attributes: ' + JSON.stringify(attributes));
	return (
		<div { ...useBlockProps() }>
			<InspectorControls>
				<PanelBody>
					<LinkControl
						searchInputPlaceholder="Search here..."
						value={ attributes.post }
						settings={[
							{
								id: 'opensInNewTab',
								title: 'New tab?',
							},
						]}
						onChange={ ( newPost ) => {
							console.log( `The selected item URL: ${ newPost.url }.` );
							setAttributes( { post: newPost, url_btn : newPost.url } ) ;
							}
						}
						withCreateSuggestion={true}
						createSuggestion={ (inputValue) => setAttributes( { post: {
							...attributes.post,
							title: inputValue,
							type: "custom-url",
							id: Date.now(),
							url: inputValue
						}} ) }
						createSuggestionButtonText={ (newValue) => `${__("New:")} ${newValue}` }
					>
					</LinkControl>
				</PanelBody>
			</InspectorControls>
			<div>
				<p>
					<TextControl
					help="Write the text first row."
					label="Header with bg image"
					onChange={(value) => {
						setAttributes( { message_1: value } )
					}}
					value= { attributes.message_1 }
					/>
				</p>
				<p>
					<TextControl
					help="Write the text second row."
					onChange={(value) => {
						setAttributes( { message_2: value } )
					}}
					value= { attributes.message_2 }
					/>
				</p>
			</div>
			<div>
				<MediaUpload
					onSelect={ ( media ) =>{
							console.log( 'selected ' + media.length );
							console.log(media);
							setAttributes({
								imgUrl: media.sizes.full.url,
							});
						}
					}
					allowedTypes={ ALLOWED_MEDIA_TYPES }
					render={ ( { open } ) => (
						<div>
							<p>Choose some image for use in the background.</p>
							<Button onClick={ open }>Open Media Library</Button>
							<img src={attributes.imgUrl} />
						</div>
					) }
				/>
			</div>
			<div>
				<TextControl
					help="Write the text that appers in the button."
					onChange={(value) => {
						setAttributes( { message_btn: value } )
					}}
					value= { attributes.message_btn }
					/>
			</div>
		</div>
	);
}
