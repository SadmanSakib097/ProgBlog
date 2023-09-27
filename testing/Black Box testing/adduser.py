from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.keys import Keys
import time

driver = webdriver.Chrome(ChromeDriverManager().install())

driver.get("http://localhost/ProgBlog/admin/adduser.php")


input_username = driver.find_element_by_xpath('/html/body/div/form/table/tbody/tr[1]/td[2]/input')
input_password = driver.find_element_by_xpath('/html/body/div/form/table/tbody/tr[2]/td[2]/input')
input_user_role = driver.find_element_by_xpath('//*[@id="select"]')

input_username.send_keys("tes1")
time.sleep(5)
input_password.send_keys("123")
time.sleep(5)
input_user_role.send_keys("Editor")

btnSubmit = driver.find_element_by_xpath('/html/body/div/form/table/tbody/tr[4]/td[2]/input')
btnSubmit.click()

try:
	banner = driver.find_element_by_xpath('/html/body/div/span')

	if banner.text == "User Created Successfully":
		print("OK")
	else:
		print("Banner Text is incorrect")

except Exception as e:
	print(e)

print("Done")


while True:
	pass
