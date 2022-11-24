/**
 * Function that creates a FormTokenField component with the ability to fetch pages in real time and return them as a result.
 *
 * For more documentation see:
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/components/form-token-field/
 * @see https://developer.wordpress.org/block-editor/how-to-guides/data-basics/2-building-a-list-of-pages/
 *
 */
 import { FormTokenField } from '@wordpress/components';
 import { useState } from '@wordpress/element';
 import { useSelect } from '@wordpress/data';
 import { store as coreDataStore } from '@wordpress/core-data';
 
 function FilterableList( { setAttributes, attributes, value } ) {
     let suggestions_of_pages = [];
 
     const [ searchTerm, setSearchTerm ] = useState( '' );
     const { pages, hasResolved } = useSelect(
         ( select ) => {
             let query = {};
             if ( searchTerm ) {
                 query.search = searchTerm;
             }
             return {
                 pages: select( coreDataStore ).getEntityRecords(
                     'postType',
                     'services_ctp',
                     query
                 ),
                 hasResolved: select( coreDataStore ).hasFinishedResolution(
                     'getEntityRecords',
                     [ 'postType', 'services_ctp', query ]
                 ),
             };
         },
         [ searchTerm ]
     );
 
     //console.log("Pages : ", pages );
 
     if ( hasResolved && pages !== null ) {
         suggestions_of_pages = pages.map( ( page ) => {
             return page.title.raw + ' (' + page.id + ')';
         } );
     }
 
     return (
         <FormTokenField
             placeholder="Select your services."
             maxLength={ 5 }
             onInputChange={ setSearchTerm }
             suggestions={ suggestions_of_pages }
             value={ value }
             onChange={ ( tokens ) => {
                 let id = [];
                 tokens.forEach( ( token ) => {
                     const rex = /\(([\w]+)\)/;
                     const post_id = token
                         .match( rex )[ 0 ]
                         .replace( rex, '$1' );
                     console.log( post_id );
                     id.push( post_id );
                 } );
                 setAttributes( {
                     pages: tokens,
                     id,
                 } );
             } }
         />
     );
 }
 
 export default FilterableList;