export default class SkillTransform {

    updateTransform(skill: ISkill) {
        return JSON.stringify({
            id: skill.id,
            name: skill.name,
            slug: skill.slug,
            synonyms: JSON.parse(skill.synonyms),
            frontendPosition: skill.frontendPosition,
            backendPosition: skill.backendPosition
        });
    }

}
