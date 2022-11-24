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
import { useBlockProps, InnerBlocks } from '@wordpress/block-editor';
import { Panel, PanelBody, PanelRow } from '@wordpress/components';

const ALLOWED_BLOCKS = [
	'core/columns',
	'core/column',
	'core/heading',
	'core/paragraph',
	'core/list',
];
const TEMPLATE = [
	[
		'core/columns',
		{ className: 'row w-100' },
		[
			[
				'core/column',
				{ className: 'col-sm-4 d-flex align-items-center' },
				[
					[
						'core/heading',
						{
							level: 2,
							className: 'fs-54 text-success',
							placeholder: 'Enter your Title...',
							content: 'About Me',
						},
					],
				],
			],
			[
				'core/column',
				{ className: 'col-sm-8 text-success' },
				[ [ 'core/paragraph', {} ] ],
			],
		],
	],
];

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
export default function Edit( { attributes, setAttributes } ) {
	//console.trace(JSON.stringify(attributes));

	const bodyTitle = 'My Block Settings';
	const opened = true;

	return (
		<div { ...useBlockProps() }>
			<Panel header="About Block">
				<PanelBody title={ bodyTitle } opened={ opened }>
					<PanelRow>
						<InnerBlocks
							allowedBlocks={ ALLOWED_BLOCKS }
							template={ TEMPLATE }
						/>
						;
					</PanelRow>
				</PanelBody>
			</Panel>
		</div>
	);
}
