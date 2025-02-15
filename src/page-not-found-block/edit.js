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
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import { PanelBody, TextControl, ToggleControl } from '@wordpress/components';


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
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {
	const { showPrefix, prefix, showSuffix, suffix } = attributes;

	return (
		<>
			<InspectorControls>
				<PanelBody title={__('Settings', 'page-not-found-block')}>
					<ToggleControl
						checked={!!showPrefix}
						label={__(
							'Show Prefix',
							'page-not-found--block'
						)}
						onChange={() =>
							setAttributes({
								showPrefix: !showPrefix,
							})
						}
					/>
					{showPrefix && (
						<TextControl
							__nextHasNoMarginBottom
							__next40pxDefaultSize
							label={__(
								'prefix',
								'page-not-found-block'
							)}
							value={prefix || ''}
							onChange={(value) =>
								setAttributes({ prefix: value })
							}
						/>
					)}

				</PanelBody>
			</InspectorControls>

			<p {...useBlockProps()}>
				{__(
					'Page Not Found Block – hello from the editor!',
					'page-not-found-block'
				)}
			</p>
		</>
	);
}
