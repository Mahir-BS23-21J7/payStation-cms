import React from 'react';

export default function BasicCard({ children }) {
    return (
        <div className="py-5">
            <div className="mx-auto pl-0 pr-1 sm:pr-4">
                <div className="bg-white-200 overflow-hidden shadow-sm rounded">
                    <div className="p-6 bg-white border-b border-gray-200">
                        { children }
                    </div>
                </div>
            </div>
        </div>
    );
}