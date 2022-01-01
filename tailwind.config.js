module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                "primary" : "#69b934"
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [require("@themesberg/flowbite/plugin")],
};
