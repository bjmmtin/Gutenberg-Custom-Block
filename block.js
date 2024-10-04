( function ( blocks, blockEditor, element ) {
    var el = element.createElement;
    var useBlockProps = blockEditor.useBlockProps;

    blocks.registerBlockType('faust/faust-cta-modal-block', {
        title: 'Custom CTA Block',
        icon: 'warning',  
        category: 'widgets',  // Add your block to the widgets category.
        attributes: {
            ctatitle: {
                type: 'string',
                default: 'Find out if you Qualify for an Asbestos Cancer Lawsuit',
            },
            ctadescription: {
                type: 'string',
                default: 'Secure skilled legal representation for you and your family. Our dedicated attorneys work to resolve your claim efficiently, minimizing courtroom involvement. Contact us today to pursue the compensation you deserve.',
            },
            ctafullform: {
                type: 'boolean',
                default: false,
            },
        },
        edit: function ( props ) {
            var blockProps = useBlockProps();

            return el(
                'div',
                blockProps,
                el( 'div', { className: 'cta-title' },
                    el( 'label', {}, 'CTA Title' ),
                    el( 'input', {
                        type: 'text',
                        value: props.attributes.ctatitle,
                        onChange: ( event ) => props.setAttributes({ ctatitle: event.target.value })
                    })
                ),
                el( 'div', { className: 'cta-description' },
                    el( 'label', {}, 'CTA Description' ),
                    el( 'textarea', {
                        value: props.attributes.ctadescription,
                        onChange: ( event ) => props.setAttributes({ ctadescription: event.target.value })
                    })
                ),
                el( 'div', { className: 'cta-fullform' },
                    el( 'label', {}, 'Enable Full Form' ),
                    el( 'input', {
                        type: 'checkbox',
                        checked: props.attributes.ctafullform,
                        onChange: ( event ) => props.setAttributes({ ctafullform: event.target.checked })
                    })
                )
            );
        },
        save: function () {
            // Use dynamic rendering or server-side rendering, so we don't need this.
            return null;
        },
    });
} )( window.wp.blocks, window.wp.blockEditor, window.wp.element );
