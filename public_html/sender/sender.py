import requests
import random
import time
from datetime import datetime

while True:
    current_datetime = datetime.now()
    
    formatted_datetime = current_datetime.strftime("%Y-%m-%d %H:%M:%S")
    
    random_data = {
        'ph': random.uniform(0.0, 14.0),
        'suhu': random.uniform(20.0, 30.0),
        'oksigen': random.uniform(0.0, 100.0),
        'aerator': random.uniform(0.0, 10.0),
        'amoniak': random.uniform(0.0, 100.0),
        'date': formatted_datetime
    }    
    
    url = 'http://localhost/SIMOFLOK_IoT3/sendData.php'
    response = requests.post(url, data=random_data)
    
    print(response)
    print(random_data)

    time.sleep(5)


