function useValidators() {
    const isImage = (file) => {
        const filename = file.name; // Get the filename
        const extension = filename.split(".").pop().toLowerCase();

        return extension == "jpg" || extension == "jpeg" || extension == "png";
    };

    const isText = (text) => {
        if (isNaN(text)) return true;
        else return false;
    };

    const isLink = (text) => {
        const urlRegex = /^(http|https):\/\/[^\s]+/g; // Regular expression for URLs
        return urlRegex.test(text);
    };

    const checkLength = (text, length) => {
        return (text.length >= length);
    }

    return {
        isImage,
        isText,
        isLink, 
        checkLength
    };
}
