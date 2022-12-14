/**
 *
 * Heading with Icon
 *
 * @package
 *
 */

/**
 * Internal dependendies
 */
import Edit from './edit';
import { getIconComponant } from './icons-map';

/**
 * WordPress dependendies
 */
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';
import { RichText } from '@wordpress/block-editor';

/**
 * Register block type.
 */
registerBlockType('aquilia-blocks/heading', {
	title: __('Heading with icon', 'aquilia'),
	description: __('Add Heading with icons', 'aquilia'),
	icon: 'admin-customizer',
	category: 'aquilia',
	attributes: {
		Option: {
			type: 'string',
			default: 'dos',
		},
		content: {
			type: 'string',
			source: 'html',
			selector: 'h4',
			default: __('DoSs', 'aquilia'),
		},
	},
	edit: Edit,

	/**
	 * Save function
	 *
	 * param {Object} props Props
	 *
	 * returns {Object} Content
	 *
	 * @param props
	 */
    
	save(props) {
		const HeadingIcon = getIconComponant(option);
		const {
			attributes: { option, content },
		} = props;

		return (
			<div className="aquilia-icon-heading">
				<span className="aquilia-icon-heading__heading">
					<HeadingIcon />
				</span>
				<RichText.content tagName="h4" value={content} />
			</div>
		);
	},
} );
