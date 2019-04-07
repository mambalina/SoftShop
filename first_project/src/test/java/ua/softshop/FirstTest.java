package ua.softshop;

import org.junit.Assert;
import org.junit.Test;
import org.openqa.selenium.Alert;
import org.openqa.selenium.By;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.ie.InternetExplorerDriver;
import org.openqa.selenium.interactions.Actions;

import java.util.List;

import static java.lang.Thread.sleep;

public class FirstTest {
    //System.setProperty("webdriver.opera.driver", "E:\\Selenium\\drivers\\operadriver.exe");

    @Test
//    простенький тест для начала, просто тык , доделать до выбора товара
    public void firstTest() throws InterruptedException {
        System.setProperty("webdriver.ie.driver", "E:\\Selenium\\drivers\\IEDriverServer.exe");
        InternetExplorerDriver driver = new InternetExplorerDriver();
        driver.get("http://softshop.ua/index.php");
//        открыть на весь экран
        driver.manage().window().maximize();
        Assert.assertEquals(driver.getTitle(), "SoftShop");
        // id ^= text  - id начинается с text
        // id $= text  - id заканчивается на text
        driver.get("http://softshop.ua/index.php");
        driver.findElement(By.className("him")).click();
        Actions actions = new Actions(driver);
        WebElement card = driver.findElement(By.xpath("(//div[contains(@class, 'card-body')])[2]"));
        actions.moveToElement(card).build().perform();
        String name = card.findElement(By.className("ttle")).getText();
        card.findElement(By.cssSelector("a[href*=\"information\"] ")).click();
        String ttle = driver.findElement(By.xpath("//div[contains(@class, 'about-boots')]/h3")).getText();  // Relative XPath
        Assert.assertEquals(name, ttle);
        // покликать картинки
        List <WebElement> images = driver.findElements(By.className("pics"));
        for (int i = 0; i<images.size(); i++) {
            images.get(i).click();
            Thread.sleep(100);
        }
        driver.findElement(By.tagName("label")).click();
        driver.findElementByCssSelector("input[type='number']").clear();
        driver.findElementByCssSelector("input[type='number']").sendKeys("2");
        driver.findElementByCssSelector("input[value^='Добавить']").click();
        driver.findElement(By.cssSelector("a[href=\"basket.php\"]")).click();
        Thread.sleep(5000);
        //todo: дописать покупку
        driver.quit();
    }
//    (By.cssSelector("a[href*= \"signin\"]")))

        @Test
        // регистрация нового пользователя
        public void newUserReg() throws InterruptedException {
            System.setProperty("webdriver.ie.driver", "E:\\Selenium\\drivers\\IEDriverServer.exe");
            InternetExplorerDriver driver = new InternetExplorerDriver();
            driver.manage().window().maximize();
            driver.get("http://softshop.ua/index.php");
            driver.findElement(By.cssSelector("a[href= \"signin.php\"]")).click();
            sleep(3000);
            Assert.assertEquals(driver.getTitle(), "Регистрация");
            driver.findElement(By.name("username")).sendKeys("Lia");
            driver.findElement(By.name("user_l_name")).sendKeys("Kamper");
            driver.findElement(By.name("email")).sendKeys("lia@mail.ru");
            driver.findElement(By.name("password")).sendKeys("qwe");
            driver.findElement(By.name("password2")).sendKeys("qwe");
            driver.findElement(By.id("button")).click();
            sleep(5000);
            String text = driver.findElement(By.xpath("//div[@class='access']")).getText();
            Assert.assertEquals(text, "Регистрация прошла успешно!");
            Thread.sleep(5000);
            driver.quit();
        }

    @Test
    // неправильный пароль
    public void wrongPass() throws InterruptedException {
        System.setProperty("webdriver.ie.driver", "E:\\Selenium\\drivers\\IEDriverServer.exe");
        InternetExplorerDriver driver = new InternetExplorerDriver();
        driver.manage().window().maximize();
        driver.get("http://softshop.ua/index.php");
        driver.findElement(By.cssSelector("a[href*= \"signin\"]")).click();
        sleep(3000);
        Assert.assertEquals(driver.getTitle(), "Регистрация");
        driver.findElement(By.name("username")).sendKeys("Ирина");
        driver.findElement(By.name("user_l_name")).sendKeys("Романова");
        driver.findElement(By.name("email")).sendKeys("us@mail.ru");
        driver.findElement(By.name("password")).sendKeys("aas");
        driver.findElement(By.name("password2")).sendKeys("as");
        driver.findElement(By.id("button")).click();
        sleep(1000);
        String text = driver.findElement(By.xpath("//div[@class='err']")).getText();
        Assert.assertEquals(text, "Пароли не совпадают");
        Thread.sleep(5000);
        driver.quit();
    }

    @Test
    // пользователь существует
    public void existUser() throws InterruptedException {
        System.setProperty("webdriver.ie.driver", "E:\\Selenium\\drivers\\IEDriverServer.exe");
        InternetExplorerDriver driver = new InternetExplorerDriver();
        driver.manage().window().maximize();
        driver.get("http://softshop.ua/index.php");
        driver.findElement(By.cssSelector("a[href*= \"signin\"]")).click();
        Assert.assertEquals(driver.getTitle(), "Регистрация");
        driver.findElement(By.name("username")).sendKeys("Ирина");
        driver.findElement(By.name("user_l_name")).sendKeys("Романова");
        driver.findElement(By.name("email")).sendKeys("adiala@mail.ru");
        driver.findElement(By.name("password")).sendKeys("aas");
        driver.findElement(By.name("password2")).sendKeys("aas");
        driver.findElement(By.id("button")).click();
        sleep(1000);
        String text = driver.findElement(By.xpath("//div[@class='err']")).getText();
        Assert.assertEquals(text, "Пользователь с таким email уже существует");
        Thread.sleep(5000);
        driver.quit();
    }

    @Test
    //вход успешный
    public void loginUser() throws InterruptedException {
        System.setProperty("webdriver.ie.driver", "E:\\Selenium\\drivers\\IEDriverServer.exe");
        InternetExplorerDriver driver = new InternetExplorerDriver();
        driver.manage().window().maximize();
        driver.get("http://softshop.ua/index.php");

        Actions actions = new Actions(driver);
        actions.moveToElement(driver.findElement(By.id("login"))).build().perform();

        driver.findElementByName("login").sendKeys("adiala@mail.ru");
        driver.findElementByName("pass").sendKeys("123123");
        driver.findElementByClassName("signin").submit();
        Thread.sleep(5000);
        Assert.assertEquals("Аккаунт", driver.getTitle());
        driver.quit();
    }

    @Test
    //вход не успешный
    public void wrongloginUser() throws InterruptedException {
        System.setProperty("webdriver.ie.driver", "E:\\Selenium\\drivers\\IEDriverServer.exe");
        InternetExplorerDriver driver = new InternetExplorerDriver();
        driver.manage().window().maximize();
        driver.get("http://softshop.ua/index.php");

        Actions actions = new Actions(driver);
        actions.moveToElement(driver.findElement(By.id("login"))).build().perform();

        driver.findElementByName("login").sendKeys("adiala@mail.ru");
        driver.findElementByName("pass").sendKeys("1223");
        driver.findElementByClassName("signin").submit();
        Thread.sleep(5000);
        Assert.assertEquals("Регистрация", driver.getTitle());
        driver.quit();
    }
}





