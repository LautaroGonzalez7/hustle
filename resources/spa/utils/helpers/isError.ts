export const isError = (httpStatusCode: number) => {
    const digit = parseInt(httpStatusCode.toString()[0]);
    return (digit === 4 || digit === 5);
};
