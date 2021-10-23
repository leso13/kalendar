export default {
    methods: {
        monthName(month) {
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
        monthShortName(month) {
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
        },
        dayName(number) {
            switch (number) {
                case 0: return "pon";
                case 1: return "uto";
                case 2: return "str";
                case 3: return "štv";
                case 4: return "pia";
                case 5: return "sob";
                case 6: return "ned";
            }
        return "undefined"
        },
    },
};