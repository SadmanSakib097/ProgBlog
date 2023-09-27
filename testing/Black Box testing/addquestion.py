from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.keys import Keys
import time

driver = webdriver.Chrome(ChromeDriverManager().install())

driver.get("http://localhost/ProgBlog/admin/add_exam.php")


input_Exam_Title = driver.find_element_by_xpath('//*[@id="exam_title"]')
input_Exam_Creation_Time = driver.find_element_by_xpath('//*[@id="exam_datatime"]')
input_Question = driver.find_element_by_xpath('//*[@id="qsn1"]')
input_Solution=driver.find_element_by_xpath('//*[@id="solution"]')
input_Points=driver.find_element_by_xpath('//*[@id="point"]')

input_Exam_Title.send_keys("java")
time.sleep(5)
input_Exam_Creation_Time.send_keys("06/23/2022")
time.sleep(5)
input_Question.send_keys("The name JAVA is known to the world as?")
time.sleep(5)
input_Solution.send_keys("An Island in Indonesia")
time.sleep(5)
input_Points.send_keys("20")

btnSubmit = driver.find_element_by_xpath('/html/body/div/div/div[2]/div/div/form/div[6]/button')
btnSubmit.click()

try:
	banner = driver.find_element_by_xpath('/html/body/div/div/span')

	if banner.text == "Post Inserted Successfully.":
		print("OK")
	else:
		print("Banner Text is incorrect")

except Exception as e:
	print(e)

print("Done")


while True:
	pass
