const client = new Client({
    disableMentions: "everyone",
    restTimeOffset: 0
  });


client.on("ready", () => {
    console.log(`${client.user.username} ready!`);
    client.user.setActivity({ type: "LISTENING" });
    const open = require('open');
  
   setInterval( function(){
    const date = require('date-and-time');
    const now  =  new Date();
   
    const jam = date.format(now,'HH:mm:ss');
    const weekend = now.toLocaleString('id-ID', {
      weekday: 'long',
      // year: 'numeric',
      // month: 'long',
      // day: 'numeric'
    });
    
    // hook.send(jam);
  
    let absen = "08:00:00";
    let istirahat = "11:30:00";
    let pulang = "17:00:00";
  
    if (jam == absen && weekend != "Saturday" && weekend != "Sunday"){
      open('http://url.php');
    } else if (jam == istirahat && weekend != "Saturday" && weekend != "Sunday"){
      open('http://url.php');
    } else if(jam == pulang && weekend != "Saturday" && weekend != "Sunday"){
      open('http://url.php');
    } else{
      // console.log(jam)
    }
  
   }, 1000);
});