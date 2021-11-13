import {isError} from "../../utils/helpers/isError";
import {ActionNames} from "../../utils/constants/ActionNames";

export default class SliderAdapter {

    createAdapt(response: IResponse) {
        const { data, status } = response;

        if (!isError(status)) {
            return {
                data: data,
                type: ActionNames.searchCreateSuccessfully,
                error: false
            }
        }

        return {
            data: data,
            type: ActionNames.searchCreateFailed,
            error: true
        }
    }

    updateAdapt(response: IResponse) {
        const { data, status } = response;

        if (!isError(status)) {
            return {
                data: data,
                type: ActionNames.searchCreateSuccessfully,
                error: false
            }
        }

        return {
            data: data,
            type: ActionNames.searchCreateFailed,
            error: true
        }
    }

    get(response: IResponse) {
        const { data, status } = response;

        if (!isError(status)) {
            return {
                data: data.data,
                type: ActionNames.searchGetSuccessfully,
                error: false
            }
        }

        return {
            data: data,
            type: ActionNames.searchGetFailed,
            error: true
        }
    }

    getAllAdapt(response: IResponse) {
        const { data, status } = response;

        if (!isError(status)) {
            return {
                data: data.data,
                type: ActionNames.searchGetSuccessfully,
                error: false
            }
        }

        return {
            data: data,
            type: ActionNames.searchGetFailed,
            error: true
        }
    }

    addImageAdapt(response: IResponse) {
        const { data, status } = response;

        if (!isError(status)) {
            return {
                data: data,
                type: ActionNames.searchCreateSuccessfully,
                error: false
            }
        }

        return {
            data: data,
            type: ActionNames.searchCreateFailed,
            error: true
        }
    }
}
