import PureCounter from "@srexi/purecounterjs";

const purecounter = (selector) => {
    if (document.querySelector(selector)) {
        new PureCounter({
            // Setting that can't' be overriden on pre-element
            selector: selector, // HTML query selector for spesific element

            // Settings that can be overridden on per-element basis, by `data-purecounter-*` attributes:
            // start: 0, // Starting number [uint]
            // end: 100, // End number [uint]
            duration: 1, // The time in seconds for the animation to complete [seconds]
            delay: 10, // The delay between each iteration (the default of 10 will produce 100 fps) [miliseconds]
            once: true, // Counting at once or recount when the element in view [boolean]
            pulse: false, // Repeat count for certain time [boolean:false|seconds]
            decimals: 0, // How many decimal places to show. [uint]
            legacy: true, // If this is true it will use the scroll event listener on browsers
            filesizing: false, // This will enable/disable File Size format [boolean]
            currency: false, // This will enable/disable Currency format. Use it for set the symbol too [boolean|char|string]
            formater: "us-US", // Number toLocaleString locale/formater, by default is "en-US" [string|boolean:false]
            separator: false, // This will enable/disable comma separator for thousands. Use it for set the symbol too [boolean|char|string]
        });

    }
}

export default purecounter;
