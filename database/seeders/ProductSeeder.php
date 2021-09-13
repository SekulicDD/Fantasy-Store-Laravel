<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $names=["Mountain walking t-shirt",
            "Nike Air Max Plus III",
            "Nike Air Max Black",
            "Nike Air Max 90",
            "Monolith brushed calf leather lace-up shoes",
            "Prada Synthesis high-top sneakers",
            "Suede platform sandals",
            "Leather booties",
            "Zerimar Men's Leather Shoes",
            "2019 Spring Men Shoes Slip On",
            "Fashion Men's Lace Printed Linen Long Sleeve Casual Shirt",
            "Short Sleeve Design Floral Shirt",
            "Men Sweater Monogram",
            "BiDen Waterproof Sportwatch",
            "NAVIFORCE 9110 Men Watch",
            "OLEVS Men Watch",
            "TISSOT Watch Fof Women",
            "OLEVS Women Watch",
            "7-SEVEN Business Women",
            "Women's Detroit Muscle super bee Varsity T-SHIRT",
            "Detroit Muscle Super Bee SWEATSHIRT",
            "Viper GTS-R T-SHIRT",
            "Men's Nike DRI-FIT 1/2 ZIP",
            "Performance Fleece Hooded SWEATSHIRT",
            "Men's Vintage Super Bee Stripe T-SHIRT",
            "Men's HEMI Reflective T-SHIRT",
            "Charger Women’s Perfect Blend V-NECK T-SHIRT",
            "Women's HellCAT Relaxed V-NECK T-SHIRT",
            "LEGO 2018 Dodge Challenger SRT Demon and 1970 Dodge Charger R/T SET",
            "LEGO Technic DOM’S Dodge Charger",
            "XCD Bluetooth On-Ear Headphones (Black)",
            "BEATS Solo 3 Wireless Bluetooth Headphones",
            "Beats by Dr. Dre Studio3 Wireless Bluetooth Headphones"];

$price=[50.99,39.50,40.99,55.00,110.99,100.50,220.00,60.99,150.00,99.99,30.50,20.99,90.00,61.00,40.99,79.99,197.93,60.90,90.99,30.00,29.99,25.45,50.99,45.99,23.50,30.65,17.94,18.95,29.95,99.99,20.35,50.99,69.69];

$description=["At the foot of Mont Black, our team of enthusiasts designed this long-sleeved, moisture wicking t-shirt for regular mountain walking. Ideal for the morning chill or when up a summit. This t-shirt will win you over with it absorbent and moisture wicking qualities.",
    "The Nike Air Max Plus III combines ultra-comfortable Tuned Air Technology with an energetic silhouette made famous by its predecessors. It updates the look with plastic accents fused to the upper.",
    "Let your attitude have the edge in your Nike Air Max Plus, a Tuned Air experience that offers premium stability and unbelievable cushioning. Featuring the OG's wavy design lines, plastic accents and airy mesh on the upper, this defiant look gets elevated with a silver outlining that highlights its iconic features.",
    "The Nike Air Max 90 stays true to its OG roots with the iconic Waffle sole, stitched overlays and classic TPU accents. Fresh, seasonal colours give a modern look while Max Air cushioning adds comfort to your journey.",
    "The upper of these brushed leather lace-up shoes, defined by the contrasting block sole, evokes Prada style from the nineties.",
    "The sneaker is given a feminine twist in this version with a rubber toecap and tapered silhouette, with the Prada logo decorating the tongue.",
    "These suede sandals with high column heel are characterized by the double crisscross band on the front. The strap with metal buckle completes the design.",
    "These booties with strong lines have a distinctive platform sole and chunky heel.",
    "Timeless and elegant, our shoes are suitable for any occasion, plus they are durable and comfortable.",
    "Casual shoes ideal for lightweight, comfortable and breathable walks",
    "It is made of high quality materials,durable enought for your daily wearing.",
    "Colour and style perfect for leisure holiday or long summer nights",
    "Burberry man jumper, made of wool bland of the highest quality",
    "Waterproof analogue quartz man watch, made of stainless steel",
    "Luxury fashion, 24 hours display, leather strap quartz wrist watch",
    "Black Stainless Steel Men Watch with high quality Japanese quartz movement,scratch-resistant.",
    "Tissot, the prestigious and recognized Swiss watchmaker has always been an example of innovation. and modernity developing high-tech products, special materials and advanced functionality. We have selected especially for you a sample of wide range of Swiss watches brand.",
    "Classic Stainless Steel Ladies Watch-Casual female watch, diameter 29MM ",
    "Comfortable and durable genuine leather band.flexible, comfortable, waterproof, breathable, easy to adjust the watch to your wrist size when you need a watch to prove that you value your time. ",
    "Sport this t-shirt, and show off your love for Detroit Muscle with a stylish look that's fashionable all year long.",
    "The perfect comfortable and casual men's sweatshirt to show off your favorite brand.",
    "This tee encompasses vehicle designer's artistic features of the legendary Viper GTS-R and is perfect for any race fan.",
    "This stylish men's cover-up offers a comfortable stretch for uninhabited movement along with Dri-FIT moisture management technology.",
    "Stay cozy when you pull on this hooded performance fleece sweatshirt that's designed for a soft fit to keep you warm all day.",
    "This vintage shirt functions as a bright addition to any wardrobe with its comfortable crew neck design.",
    "Wear this short sleeve crew neck t-shirt and look stylish while staying comfortable as you show off your love for power and performance.",
    "This lightweight women's V-neck t-shirt is the perfect blend of cotton and poly for all day comfort.",
    "This Hellcat ladies t-shirt is the perfect addition to your wardrobe to show off your love for Dodge.",
    "Build the awesome LEGO Speed Champions 2018 Dodge Challenger SRT Demon and 1970 Dodge Charger R/T vehicles and prepare for a new car vs. classic car drag racing duel! Wait for the start lights to change and speed away at full throttle.",
    "This scale model LEGO® Technic set depicts the signature 1970 Dodge Charger that's driven by street racer Dominic Toretto from the Fast & Furious series.",
    "These Headphones deliver High Quality Sound with Powerful Bass to help motivate you while you exercise.",
    "With award-winning Beats sound you get premium fine-tuned acoustics with clarity, breadth and balance.",
    "Put the world on hold with a pair of Beats by Dr. Dre Studio3 Wireless Bluetooth Headphones in red."];

$image=["img/1.jpg",
    "img/2.jpg",
    "img/3.jpg",
    "img/4.jpg",
    "img/5.jpg",
    "img/6.jpg",
    "img/7.jpg",
    "img/8.jpg",
    "img/9.jpg",
    "img/10.jpg",
    "img/11.jpg",
    "img/12.jpg",
    "img/13.jpg",
    "img/14.jpg",
    "img/15.jpg",
    "img/16.jpg",
    "img/17.jpg",
    "img/18.jpg",
    "img/19.jpg",
    "img/20.jpg",
    "img/21.jpg",
    "img/22.jpg",
    "img/23.jpg",
    "img/24.jpg",
    "img/25.jpg",
    "img/26.jpg",
    "img/27.jpg",
    "img/28.jpg",
    "img/29.jpg",
    "img/30.jpg",
    "img/31.jpg",
    "img/32.jpg",
    "img/33.jpg"];

$category_id=[1,5,5,6,6,6,6,6,5,5,1,1,1,3,3,3,4,4,4,2,1,1,1,1,1,1,2,2,7,7,8,8,8];


        for($i = 0; $i <= 32; $i++) {
            $id = \DB::table('products')->insertGetId([
                'name' => $names[$i],
                'price' => $price[$i],
                'description' => $description[$i],
                'category_id' =>$category_id[$i],
                'image_id'=>$i+2
            ]);


        }
    }
}
