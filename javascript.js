function calculateForm() {
    validateAndSubmitForm();
    return false;
}

function validateAndSubmitForm() {

    //initialize all the inputs
    let name = document.forms['form']['name'].value;
    let benchPressWeight = document.forms['form']['benchPressWeight'].value;
    let deadliftWeight = document.forms['form']['deadliftWeight'].value;
    let squatWeight = document.forms['form']['squatWeight'].value;
    let bodyWeight = document.forms['form']['bodyWeight'].value;
    let gender = document.forms['form']['gender'].value;
    let measurementUnit = document.forms['form']['measurement'].value;
    let dateOfLift = document.forms['form']['dateOfLift'].value;
    var totalWilksScore;

    //validate all inputs
    if (name == "" || isOnlyWhiteSpace(name) &&
        benchPressWeight == "" || isOnlyWhiteSpace(benchPressWeight) ||
        deadliftWeight == "" || isOnlyWhiteSpace(deadliftWeight) ||
        squatWeight == "" || isOnlyWhiteSpace(squatWeight) ||
        bodyWeight == "" || isOnlyWhiteSpace(bodyWeight)
        ) {
        alert("Please make sure all fields are filled in and correct.");
        return false;
    } else {       
        var totalWeightLifted = Number(benchPressWeight) + Number(deadliftWeight) + Number(squatWeight);
        bodyWeight = Number(bodyWeight);

        //once all inputs are validated, do the math on the wilks score
        //convert measurement unit from lbs to kgs if needed
        if (measurementUnit == "lbs") {
            let convertedTotalWeight = (totalWeightLifted * 0.45359237).toFixed(2);
            let convertedBodyWeight = (bodyWeight * 0.45359237).toFixed(2);

            //once weight is converted, calculate the wilks score
            totalWilksScore = wilksScore(convertedBodyWeight, convertedTotalWeight, gender);
        } else {
            //once weight is converted, calculate the wilks score
            totalWilksScore = wilksScore(bodyWeight, totalWeightLifted, gender);
        }

        //output wilks score and submission button
        document.cookie="total_wilks=" + totalWilksScore;
        document.cookie="benchPressWeight=" + benchPressWeight;
        document.cookie="deadliftWeight=" + deadliftWeight
        document.cookie="squatWeight=" + squatWeight;
        document.cookie="bodyWeight=" + bodyWeight;
        document.cookie="gender=" + gender;
        document.cookie="dateOfLift="+ dateOfLift;
        document.cookie="name=" + name;
        document.cookie="unit=" + measurementUnit;

        document.getElementById("formEntry").style.display = 'none';
        document.getElementById("form").innerHTML += "<br /><br /><h2>Your Wilks Score is " + 
            totalWilksScore + 
            "</h2><br /><button type='submit'>Submit Score!</button>";
    }
}

function isOnlyWhiteSpace(input) {
    if (!input.replace(/\s/g, '').length) {
        console.log('input only contains whitespace');
        return true;
      } else {
          return false;
      }
      
}

function wilksScore(bodyWeight, totalWeightLifted, gender) {
    var a;
    var b;
    var c;
    var d;
    var e;
    var f;
    var coefficientDenom;
    var coefficient; 
    var totalWilks;
    
    if (gender == "male") {
        a = 47.46178854;
        b = 8.472061379;
        c = .07369410346;
        d = -0.001395833811;
        e = 7.07665973070743 * (Math.pow(10, -6));
        f = -1.20804336482315 * (Math.pow(10, -8));

        coefficientDenom = (a + 
            (b * bodyWeight) + 
            c * Math.pow(bodyWeight, 2) + 
            d * Math.pow(bodyWeight, 3) + 
            e * Math.pow(bodyWeight, 4) + 
            f * Math.pow(bodyWeight, 5));
    } else if (gender == "female") {
        a = -125.4255398;
        b = 13.71219419;
        c = -0.03307250631;
        d = -0.001050400051;
        e = 9.38773881462799 * (Math.pow(10, -5));
        f = -2.3334613884954 * (Math.pow(10, -8));

        coefficientDenom = (a + 
            (b * bodyWeight) + 
            c * Math.pow(bodyWeight, 2) + 
            d * Math.pow(bodyWeight, 3) + 
            e * Math.pow(bodyWeight, 4) + 
            f * Math.pow(bodyWeight, 5));
    }

    coefficient = 600 / coefficientDenom;

    console.log(coefficientDenom);
    console.log(coefficient);
    console.log(totalWeightLifted);
    console.log(bodyWeight);
    console.log(gender);

    totalWilks = (totalWeightLifted * coefficient).toFixed(2);
    return totalWilks;
}