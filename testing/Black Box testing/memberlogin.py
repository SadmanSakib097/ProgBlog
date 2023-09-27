from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.keys import Keys
import time

driver = webdriver.Chrome(ChromeDriverManager().install())

driver.get("http://localhost/ProgBlog/member/memberlogin.php")


input_username = driver.find_element_by_xpath('//*[@id="Username"]')
input_password = driver.find_element_by_xpath('//*[@id="password"]')

input_username.send_keys("user")
time.sleep(5)
input_password.send_keys("1234")

btnSubmit = driver.find_element_by_xpath('/html/body/div/div/div/form/input[3]')
btnSubmit.click()

try:
	banner = driver.find_element_by_xpath('/html/body/span')

	if banner.text == "No result found.":
		print("OK")
	else:
		print("Banner Text is incorrect")

except Exception as e:
	print(e)

print("Done")


while True:
	pass
