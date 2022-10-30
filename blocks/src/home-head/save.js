/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps } from '@wordpress/block-editor';

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.<p className='text-white'>{attributes.url_btn}</p>
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save({attributes}) {
	const blockProps = useBlockProps.save();
	console.log("Saved");
	console.log(JSON.stringify(blockProps));
	return (
		<div { ...blockProps }>
			<h2 className="title-head-block">
				{ attributes.message_1 }
			</h2>
			<p className='text-white'>{attributes.imgUrl}</p>
			<p className='text-white'>{attributes.url_btn}</p>			
		</div>
	);
}
