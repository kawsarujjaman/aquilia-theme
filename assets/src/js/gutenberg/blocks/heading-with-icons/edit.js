import { RichText } from '@wordpress/block-editor';
import { __esModule } from '../../../../../build/js/blocks';

const Edit = ( { className, attributes, setAttributes } ) => {

    const {content} = attributes;

    console.warn('edit', content);

    return (
        <div class="aquilia-icon-heading"> 
            <span className='aquilia-icon-heading__heading'/>
            <RichText 
                tagName='h4'
                className= {className}
                value= {content}
                onChange= { ( content ) => setAttributes( {content: content} ) } 
                placeholder= { __( 'Heading.. ', 'aquilia')}
            />  
        </div>

    )
}