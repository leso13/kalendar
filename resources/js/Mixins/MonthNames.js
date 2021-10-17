export default {
    methods: {
        month_name(month) {
            switch (month) {
                case 1:
                    return "január";
                case 2:
                    return "február";
                case 3:
                    return "marec";
                case 4:
                    return "apríl";
                case 5:
                    return "máj";
                case 6:
                    return "jún";
                case 7:
                    return "júl";
                case 8:
                    return "august";
                case 9:
                    return "september";
                case 10:
                    return "október";
                case 11:
                    return "november";
                case 12:
                    return "december";
            }
            return "undefined"
        },
        month_short_name(month) {
            switch (month) {
                case 1:
                    return "jan";
                case 2:
                    return "feb";
                case 3:
                    return "mar";
                case 4:
                    return "apr";
                case 5:
                    return "máj";
                case 6:
                    return "jún";
                case 7:
                    return "júl";
                case 8:
                    return "aug";
                case 9:
                    return "sep";
                case 10:
                    return "okt";
                case 11:
                    return "nov";
                case 12:
                    return "dec";
            }
            return "undefined"
        }
    },
};