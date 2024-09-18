const container1 = document.querySelector('.container1');
const search = document.querySelector('.search-box button');
const weatherBox = document.querySelector('.weatherbox');
const weatherDetails = document.querySelector('.weather-details');
search.addEventListener('click' , () => {


    const APIKey = 'c217b2e0b1fe145e8dbbe2617642e409';
    const city = document.querySelector('.search-box input').value;

    if(city == '')
        return 

    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city}&units=metric&appid=${APIKey}`).then(response => response.json()).then(json => {
        const image = document.querySelector('.weatherbox img');
        const temperature = document.querySelector('.weatherbox .temperature');
        const description = document.querySelector('.weatherbox .description');
        const humidity = document.querySelector('.weather-details .humidity span');
        const wind = document.querySelector('.weather-details .wind span');
        switch (json.weather[0].main) {
            case 'Clear':
                image.src = 'img/clear.png';
                break;
            
            case 'Rain':
                image.src = 'img/rain.png';
                break;
            case 'Snow':
               image.src = 'img/snow.png';
               break;

            case 'Clouds':
                image.src = 'img/cloud.png';
                break;
            case 'Mist':
                 image.src = 'img/mist.png';
                break;  
             
                case 'Haze':
                    image.src = 'img/mist.png';
                    break;   
            default:
                    image.src = 'img/cloud.png';
                // image.src = '';
                
        }
  

    });
});
