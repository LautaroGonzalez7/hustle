export default class SearchTransform {

    searchFilterTransform(searchFilter: ISearchFilter) {
        return JSON.stringify({
            skill_ids: searchFilter.skillIds,
            position: searchFilter.position,
            country_ids: searchFilter.countryIds,
            region_id: searchFilter.regionId,
            min_salary: searchFilter.minSalary,
            max_salary: searchFilter.maxSalary,
            is_remote: searchFilter.isRemote,
        });
    }

}
