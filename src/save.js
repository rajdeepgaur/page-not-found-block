import { useBlockProps } from '@wordpress/block-editor';

export default function save() {
    return (
        <p { ...useBlockProps.save() }>
            { 'Page Not Found Block – hello from the saved content!' }
        </p>
    );
}