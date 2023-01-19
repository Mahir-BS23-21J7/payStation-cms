import React from 'react';
import BasicCard from './BasicCard';

export default function SubHeader({ message = '' }) {
    return (
        <BasicCard> 
            { message }
        </BasicCard>
    );
}
