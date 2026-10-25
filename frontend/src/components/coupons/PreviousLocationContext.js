// PreviousLocationContext.js
import React, { createContext, useContext, useState } from 'react';

const PreviousLocationContext = createContext();

export const PreviousLocationProvider = ({ children }) => {
    const [previousLocation, setPreviousLocation] = useState(null);

    return (
        <PreviousLocationContext.Provider value={{ previousLocation, setPreviousLocation }}>
            {children}
        </PreviousLocationContext.Provider>
    );
};

export const usePreviousLocation = () => {
    return useContext(PreviousLocationContext);
};