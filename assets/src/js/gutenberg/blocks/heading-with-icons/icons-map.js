import * as SvgIcons from '../../../icons';
import { isEmpty } from 'lodash';
export const getIconComponant = ( Option ) => {
	const IconsMap = {
		dos: SvgIcons.Check,
		donts: SvgIcons.Cross,
	};
	return !isEmpty(option) && option in IconsMap
		? IconsMap[option]
		: IconsMap.dos;
};
