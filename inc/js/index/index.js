$(document).ready(function () {
    const link =
        "http://api.weatherstack.com/current?access_key=97723ce38d9db6831db20ec10e60fd0e";

    const store = {
        city: "Ulyanovsk"
    }
    const fetchData = async () => {
        try {
            const result = await fetch(`${link}&query=${store.city}&hourly=1&interval=24&redirect=manual`,
                {
                    method: 'POST',
                    redirect: 'manual'
                })
                .then(result => result.json())
                .then(commit => {
                    console.log(commit)
                    const {
                        current: {
                            cloudcover,
                            temperature,
                            humidity,
                            uv_index: uvIndex,
                            visibility,
                            wind_speed: windSpeed,
                            weather_icons: icon
                        }
                    } = commit;
                    $("#content").append(`<div class="weather">
                      <h2>Температура: ${temperature}&deg</h2>
                      <h2>Облачность: ${cloudcover}%</h2>
                      <h2>Скорость ветра: ${windSpeed} км/ч</h2>
                      <h2>Уф индекс: ${uvIndex}/100</h2>
                      <h2>Видимость: ${visibility}%</h2>
                      <h2>Влажность: ${humidity}%</h2>
                      </div>
                      <img src="${icon}">`)
                });
        }
        catch (err) {
            console.log(err);
        }
    }
    fetchData()
})

