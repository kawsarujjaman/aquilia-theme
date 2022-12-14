/**
 * Internal Dependencies
 */

/**
 * WordPress dependensies
 */
import { RichText, insperctorControls } from '@wordpress/block-editor';

import { __ } from '@wordpress/i18n';
import { PanelBody, RadioControl } from '@wordpress/components';
import { getIconComponant } from './icons-map';

/**
 *
 * Edit
 *
 * @param {Object} props               props.
 * @param          props.className
 * @param          props.attributes
 * @param          props.setAttributes
 * @return {object} Content .
 *
 */
const Edit = ( { className, attributes, setAttributes } ) => {
	// const { className, attributes, setAttributes } = props;

	const { option, content } = attributes;
	const HeadingIcon = getIconComponant(option);

	return (
		<div className="aquilia-icon-heading">
			<span className="aquilia-icon-heading__heading">
				<HeadingIcon />
			</span>

			<RichText
				tagName="h4"
				className={className}
				value={content}
				onChange={(content) => setAttributes({ content })}
				placeholder={__('Heading.. ', 'aquilia')}
			/>

			<insperctorControls>
				<PanelBody>
					<RadioControl
						label={__(' Select the Icon', 'aquilia')}
						help={__('Control Icon selections', 'aquilia')}
						options={[
							{ label: __('Dos', 'aquilia'), value: 'dos' },
							{ label: __("Dont's", 'aquilia'), value: 'donts' },
						]}
						onChange={(option) => {
							setAttributes({ option });
						}}
					/>
				</PanelBody>
			</insperctorControls>
		</div>
	);
};

export default Edit;
