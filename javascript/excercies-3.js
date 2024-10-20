// Step 1 - define some basic variables

let display = document.querySelector("#clock");
const audio = new Audio("assets/mixkit-alarm-tone-996.wav");
audio.loop = true;
let alarmTime = null;
let alarmTimeOut = null;

// Step 2 - display the clock

function updateTime() {

    let date = new Date();
    let hour = formatTime(date.getHours());
    let minutes = formatTime(date.getMinutes());
    let seconds = formatTime(date.getSeconds());

    // Convert to 12-hour format
    let amPm = hour >= 12 ? 'PM' : 'AM';
    hour = hour % 12;  // Converts 24-hour format to 12-hour format
    hour = hour ? hour : 12;  // If hour is 0, set it to 12

    currentTime = hour + " : " + minutes + " : " + seconds + " " + amPm;


    display.innerText = currentTime;

}

function formatTime(time) {
    if (time < 10) {
        return "0" + time;
    } else {
        return time;
    }
}


setInterval(updateTime, 1000);




// Step 3 - set the Alarm

function SetAlarmTime(value) {
    alarmTime = value;
};


function setAlarm(){
    if (alarmTime) {
        const current = new Date();
        const TimeToAlarm = new Date(alarmTime);

        if (TimeToAlarm > current) {
            const timeOut = TimeToAlarm.getTime() - current.getTime();
            alarmTimeOut = setTimeout(function(){
                audio.play();
            }, timeOut);
        }

    }
}

// Step 4 - clear the Alarm


function clearAlarm(){
    audio.pause();

    if (alarmTimeOut) {
        clearTimeout(alarmTime);
        alert("Alarm Cleared")
    }

}