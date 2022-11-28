import {registerBlockType} from  '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import {RichText} from '@wordpress/block-editor';

/**
 * Register block type.
 */
registerBlockType( 'aquilia-blocks/heading', {
    title : __( 'Heading with icon', 'aquilia'),
    icon :  'dashicons-admin-customizer',
    category :  'aquilia',
    attributes: {
        Option:{
            type: 'string',
            default: 'dos',
        }, 
        content:{
            type: 'String',
            source: 'html',
            selector: 'h4',
            default: __('Dos', 'aquilia'),
        },
    },
    edit: Edit,

    save( {attributes: {content}} ){
        console.warn('save', content)

        return (
            <div class="aquilia-icon-heading"> 
            <span className='aquilia-icon-heading__heading'/>
            <RichText.content tagName="h4" value={content} />
            </div>
            )
    },
});

